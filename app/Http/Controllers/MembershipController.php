<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $members = Membership::where('approval_status', 'approved')->whereDate('next_renewal_date', '>=', Carbon::today())->latest()->get();
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
            'civil_id' => 'required',
            'qualification' => 'required',
            'profession' => 'required',
            'institute' => 'required',
            'organization' => 'required',
            'kw_primary_contact_number' => 'required',
            'kw_secondary_contact_number' => 'required',
            'type' => 'required',
        ]);
        $input = $request->all();
        $input['membership_number'] = generateMembershipNumber()->mn;
        $input['approval_status'] = 'pending';
        Membership::create($input);
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
            'civil_id' => 'required',
            'qualification' => 'required',
            'profession' => 'required',
            'institute' => 'required',
            'organization' => 'required',
            'kw_primary_contact_number' => 'required',
            'kw_secondary_contact_number' => 'required',
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
