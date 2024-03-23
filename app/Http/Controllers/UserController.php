<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\MemberSkillSet;
use App\Models\User;
use App\Models\Profession;
use App\Models\Qualification;
use App\Models\SkillSet;
use App\Models\Specialization;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        try {
            $credentials = $request->only('username', 'password');
            if (Auth::attempt($credentials)) {
                if (Auth::user()->type == 'admin') :
                    return redirect()->intended('admin/dashboard')
                        ->withSuccess('User logged in successfully');
                else :
                    return redirect()->intended('user/dashboard')
                        ->withSuccess('User logged in successfully');
                endif;
            }
            return redirect()->back()->with("error", "Invalid Credentials")->withInput($request->all());
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage())->withInput($request->all());
        }
    }

    public function dashboard()
    {
        return view('admin.dash');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with("success", "User logged out successfully.");
    }

    public function changePassword()
    {
        return view('admin.user.change-password');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ]);
        $user = User::findOrFail(Auth::id())->update(['password' => bcrypt($request->password)]);
        return redirect()->back()->with("success", "Password has been reset successfully");
    }

    public function settings()
    {
        $member = Membership::where('user_id', Auth::id())->firstOrFail();
        return view('admin.settings.index', compact('member'));
    }

    public function settingsUpdate(Request $request)
    {
        Membership::where('user_id', Auth::id())->update([
            'show_mobile' => ($request->show_mobile) ?? 0,
            'show_email' => ($request->show_email) ?? 0,
        ]);
        return redirect()->route('user.profile.settings')->with("success", "Settings updated successfully");
    }

    public function addSkill(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) :
            return response()->json([
                'error' => $validator->errors()->first()
            ]);
        endif;
        $sid = SkillSet::insertGetId([
            'name' => $request->name,
            'created_by' => Auth::id(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $data = SkillSet::where('id', $sid)->where('created_by', Auth::id())->firstOrFail();
        return response()->json([
            'success' => "Skill Set created successfully",
            'data' => $data,
        ]);
    }

    public function searchMember()
    {
        $specs = Specialization::all();
        $quals = Qualification::all();
        $profs = Profession::all();
        $members = [];
        $inputs = array('Select', 'Select', 'Select', 'Select', 'Select', '');
        $skills = SkillSet::orderBy('name')->get();
        return view('admin.search.index', compact('specs', 'quals', 'profs', 'members', 'inputs', 'skills'));
    }

    public function searchMemberUpdate(Request $request)
    {
        $specs = Specialization::all();
        $quals = Qualification::all();
        $profs = Profession::all();
        $skills = SkillSet::orderBy('name')->get();
        $inputs = array($request->qualification, $request->profession, $request->specialization, $request->approval_status, $request->type, $request->skills);
        $members = Membership::when($request->qualification, function ($q) use ($request) {
            return $q->where('qualification', $request->qualification);
        })->when($request->profession, function ($q) use ($request) {
            return $q->where('profession', $request->profession);
        })->when($request->specialization, function ($q) use ($request) {
            return $q->where('specialization', $request->specialization);
        })->when($request->approval_status, function ($q) use ($request) {
            return $q->where('approval_status', $request->approval_status);
        })->when($request->type, function ($q) use ($request) {
            return $q->where('type', $request->type);
        })->when($request->skills, function ($q) use ($request) {
            return $q->whereIn('id', MemberSkillSet::whereIn('skill_id', $request->skills)->pluck('member_id'));
        })->orderBy('name')->get();
        return view('admin.search.index', compact('specs', 'quals', 'profs', 'members', 'inputs', 'skills'));
    }

    public function createuser()
    {
        User::create([
            'username' => 'editor',
            'name' => 'Editor',
            'email' => 'ppfk@ppfkuwait.com',
            'password' => bcrypt('ppf@2022###'),
            'type' => 'editor',
        ]);
        echo "User created successfully";
    }
}
