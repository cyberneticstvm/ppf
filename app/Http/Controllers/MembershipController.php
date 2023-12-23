<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationConfirmationEmail;
use App\Models\Membership;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Membership::where('approval_status', 'approved')->latest()->get();
        return view('admin.member.index', compact('members'));
    }

    public function pending()
    {
        $members = Membership::where('approval_status', 'pending')->latest()->get();
        return view('admin.member.pending', compact('members'));
    }

    public function rejected()
    {
        $members = Membership::where('approval_status', 'rejected')->latest()->get();
        return view('admin.member.rejected', compact('members'));
    }

    public function renewal()
    {
        $members = Membership::where('approval_status', 'approved')->whereDate('next_renewal_date', '<=', Carbon::today())->latest()->get();
        return view('admin.member.renew', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Progressive Professional Forum - Membership";
        return view('membership', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'dob' => 'required',
            'email' => 'required|email:rfs,dns|unique:memberships,email',
            'type' => 'required',
            'kw_primary_contact_number_country' => 'required',
            'kw_primary_contact_number' => 'required',
            'passport_number' => 'required_if:type,==,overseas',
            'civil_id' => 'required_if:type,==,primary|required_if:type,==,associate',
            'profession' => 'required_if:type,==,primary|required_if:type,==,overseas',
            'qualification' => 'required_if:type,==,primary|required_if:type,==,overseas',
        ]);
        $input = $request->except(array('kw_primary_contact_number_country', 'kw_secondary_contact_number_country'));
        $input['kw_primary_contact_number'] = $request->kw_primary_contact_number_country . $request->kw_primary_contact_number;
        $input['kw_secondary_contact_number'] = $request->kw_secondary_contact_number_country . $request->kw_secondary_contact_number;
        $input['membership_number'] = generateMembershipNumber($request->type)->mn;
        $input['approval_status'] = 'pending';
        DB::transaction(function () use ($request, $input) {
            $user = User::create([
                'name' => $request->name,
                'username' => $input['membership_number'],
                'email' => $request->email,
                'password' => bcrypt($input['membership_number']),
                'type' => $request->type,
            ]);
            $input['user_id'] = $user->id;
            Membership::create($input);
        });
        //Mail::to($request->email)->send(new RegistrationConfirmationEmail($input));
        return redirect()->back()->with("success", "Member registration success!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $member = Membership::findOrFail(decrypt($id));
        return view('admin.member.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member = Membership::findOrFail(decrypt($id));
        return view('admin.member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'approval_status' => 'required',
            'name' => 'required',
            'dob' => 'required',
            'email' => 'required|email:rfs,dns|unique:memberships,email,' . $id,
            'type' => 'required',
        ]);
        $input = $request->all();
        if ($request->file('photo')) :
            $url = uploadFile($request->file('photo'), $path = 'member/photos');
            $input['photo'] = $url;
        endif;
        Membership::findOrFail($id)->update($input);
        return redirect()->back()->with("success", "Member details updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Membership::findOrFail(decrypt($id))->delete();
        return redirect()->back()->with("success", "Member deleted successfully!");
    }
}
