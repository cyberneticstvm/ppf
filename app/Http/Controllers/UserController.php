<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        return view('admin.search.index');
    }

    public function searchMemberUpdate(Request $request)
    {
    }

    public function createuser()
    {
        User::create([
            'username' => 'admin',
            'name' => 'Administrator',
            'email' => 'ppfk@ppfkuwait.org',
            'password' => bcrypt('ppf@2022###'),
        ]);
        echo "User created successfully";
    }
}
