<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\User;
use App\Models\Profession;
use App\Models\Qualification;
use App\Models\Specialization;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

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

    public function searchMember()
    {
        $specs = Specialization::all();
        $quals = Qualification::all();
        $profs = Profession::all();
        $members = [];
        $inputs = array('Select', 'Select', 'Select', 'Select', 'Select');
        return view('admin.search.index', compact('specs', 'quals', 'profs', 'members', 'inputs'));
    }

    public function searchMemberUpdate(Request $request)
    {
        $specs = Specialization::all();
        $quals = Qualification::all();
        $profs = Profession::all();
        $inputs = array($request->qualification, $request->profession, $request->specialization, $request->approval_status, $request->type);
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
        })->orderBy('name')->get();
        return view('admin.search.index', compact('specs', 'quals', 'profs', 'members', 'inputs'));
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
