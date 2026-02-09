<?php

namespace App\Http\Controllers;

use App\Exports\MembersExport;
use App\Mail\RegistrationConfirmationEmail;
use App\Models\Governorate;
use App\Models\Membership;
use App\Models\MemberSkillSet;
use App\Models\Profession;
use App\Models\Qualification;
use App\Models\SkillSet;
use App\Models\Specialization;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

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

    public function type(string $type)
    {
        $type = decrypt($type);
        $specs = Specialization::all();
        $quals = Qualification::all();
        $profs = Profession::all();
        $govs = Governorate::all();
        $title = "Progressive Professional Forum - Membership";
        return view('memberships', compact('type', 'title', 'specs', 'quals', 'profs', 'govs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'dob' => 'required',
            'reference' => 'required',
            'email' => 'required|email:rfs,dns|unique:memberships,email',
            'type' => 'required',
            'kw_primary_contact_number_country' => 'required',
            'kw_primary_contact_number' => 'required|numeric',
            'passport_number' => 'required_if:type,==,overseas',
            /*'civil_id' => 'required_if:type,==,primary|required_if:type,==,associate|numeric|digits:12',*/
            'civil_id' => 'required',
            'profession' => 'required_if:type,==,primary|required_if:type,==,overseas',
            'qualification' => 'required_if:type,==,primary|required_if:type,==,overseas',
        ]);
        $input = $request->except(array('kw_primary_contact_number_country', 'kw_secondary_contact_number_country'));
        $input['kw_primary_contact_number'] = $request->kw_primary_contact_number_country . $request->kw_primary_contact_number;
        $input['kw_secondary_contact_number'] = $request->kw_secondary_contact_number_country . $request->kw_secondary_contact_number;
        $input['membership_number'] = generateMembershipNumber($request->type)->mn;
        $input['approval_status'] = 'pending';
        try {
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
            Mail::to($request->email)->send(new RegistrationConfirmationEmail($input));
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage())->withInput($request->all());
        }
        return redirect()->back()->with("success", "Your registration has successful! Our team will verify & process your application and update the status soon.");
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
        $specs = Specialization::all();
        $quals = Qualification::all();
        $profs = Profession::all();
        $govs = Governorate::all();
        $skills = SkillSet::orderBy('name')->get();
        $memberskills = MemberSkillSet::where('member_id', decrypt($id))->get();
        $members = Membership::whereIn('approval_status', ['approved', 'pending'])->get();
        $areas = array("Salmiya" => "Salmiya", "Abbasiya" => "Abbasiya", "Abu Halifa" => "Abu Halifa", "Fahaheel" => "Fahaheel");
        return view('admin.member.edit', compact('member', 'specs', 'quals', 'profs', 'govs', 'skills', 'memberskills', 'members', 'areas'));
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
            'civil_id' => 'required',
        ]);
        $input = $request->except(array('skills'));
        if ($request->file('photo')) :
            $url = uploadFile($request->file('photo'), $path = 'member/photos');
            $input['photo'] = $url;
        endif;
        try {
            DB::transaction(function () use ($id, $input, $request) {
                $member = Membership::findOrFail($id);
                $member->update($input);
                if ($request->skills) :
                    $skills = [];
                    foreach ($request->skills as $key => $skill) :
                        $skills[] = [
                            'skill_id' => $skill,
                            'member_id' => $id,
                        ];
                    endforeach;
                    MemberSkillSet::where('member_id', $id)->delete();
                    MemberSkillSet::insert($skills);
                endif;
                User::where('username', $member->membership_number)->update(['email' => $request->email, 'type' => $request->type]);
            });
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
        return redirect()->back()->with("success", "Member details updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Membership::findOrFail(decrypt($id));
        //User::where('username', $member->membership_number)->delete();
        $member->delete();
        return redirect()->back()->with("success", "Member deleted successfully!");
    }

    public function exportMember($status)
    {
        return Excel::download(new MembersExport($status), 'members.xlsx');
    }
}
