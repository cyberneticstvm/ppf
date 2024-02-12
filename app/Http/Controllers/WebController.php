<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordEmail;
use App\Models\About;
use App\Models\Advertisement;
use App\Models\Benevolent;
use App\Models\Category;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Job;
use App\Models\Logo;
use App\Models\Membership;
use App\Models\Official;
use App\Models\Publication;
use App\Models\Region;
use App\Models\Slider;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class WebController extends Controller
{
    public function index()
    {
        $title = "Progressive Professional Forum Kuwait";
        $sliders = Slider::where('status', 'published')->orderBy('display_order')->get();
        $events = Event::where('status', 'active')->orderBy('display_order')->get();
        $gallery = Gallery::where('status', 'active')->orderBy('display_order')->get();
        $category = Category::where('status', 'active')->get();
        $ads = Advertisement::where('position', 'floating')->where('status', 'active')->latest()->get();
        $adb = Advertisement::where('position', 'bottom')->where('status', 'active')->first();
        $adt = Advertisement::where('position', 'top')->where('status', 'active')->first();
        return view('index', compact('title', 'sliders', 'events', 'gallery', 'category', 'ads', 'adb', 'adt'));
    }

    public function about()
    {
        $title = "About Progressive Professional Forum Kuwait";
        $about = About::findOrFail(1);
        return view('about', compact('title', 'about'));
    }

    public function officials()
    {
        $title = "Progressive Professional Forum Kuwait Officials";
        $officials = Official::orderBy('display_order')->get();
        return view('officials', compact('title', 'officials'));
    }

    public function unitOfficials()
    {
        $title = "Progressive Professional Forum Kuwait Unit Officials";
        $officials = Region::orderBy('display_order')->get();
        $regions = Region::select('region')->groupBy('region')->get();
        return view('region', compact('title', 'officials', 'regions'));
    }

    public function events()
    {
        $title = "Progressive Professional Forum Kuwait Events";
        $categories = Category::where('category_type', 2)->where('status', 'active')->orderBy('display_order')->get();
        return view('events', compact('title', 'categories'));
    }

    public function benevolent()
    {
        $title = "Progressive Professional Forum Kuwait Benevolent Activities";
        $activities = Benevolent::where('status', 'active')->orderBy('display_order')->get();
        return view('benevolent', compact('title', 'activities'));
    }

    public function jobeno()
    {
        $title = "Progressive Professional Forum Kuwait Benevolent Activities / Jobs";
        return view('jobeno', compact('title'));
    }

    public function eventsAll($id)
    {
        $events = Event::where('category_id', decrypt($id))->where('status', 'active')->orderBy('display_order')->get();
        $category = Category::findOrFail(decrypt($id));
        $title = "Progressive Professional Forum Kuwait " . $category->name;
        return view('events-all', compact('events', 'category', 'title'));
    }

    public function eventSingle(string $id)
    {
        $event = Event::findOrFail(decrypt($id));
        $recents = Event::where('id', '!=', $event->id)->latest()->limit(10)->get();
        $title = $event->name;
        return view('event-single', compact('event', 'title', 'recents'));
    }

    public function publications()
    {
        $title = "Progressive Professional Forum Kuwait Publications";
        $categories = Category::where('category_type', 3)->where('status', 'active')->orderBy('display_order')->get();
        return view('publications', compact('title', 'categories'));
    }

    public function publicationsAll($id)
    {
        $publications = Publication::where('category_id', decrypt($id))->where('status', 'active')->get();
        $category = Category::findOrFail(decrypt($id));
        $title = "Progressive Professional Forum Kuwait " . $category->name;
        return view('publications-all', compact('publications', 'category', 'title'));
    }

    public function publicationSingle(string $id)
    {
        $publication = Publication::findOrFail(decrypt($id));
        $recents = Publication::where('id', '!=', $publication->id)->latest()->limit(10)->get();
        $title = $publication->name;
        return view('publication-single', compact('publication', 'title', 'recents'));
    }

    public function gallery()
    {
        $title = "Progressive Professional Forum Kuwait Gallery";
        $categories = Category::where('category_type', 1)->where('status', 'active')->orderBy('display_order')->get();
        return view('gallery', compact('title', 'categories'));
    }

    public function galleryAll($id)
    {
        $gals = Gallery::where('category_id', decrypt($id))->where('status', 'active')->orderBy('display_order')->get();
        $category = Category::findOrFail(decrypt($id));
        $title = "Progressive Professional Forum Kuwait " . $category->name;
        return view('gallery-all', compact('gals', 'category', 'title'));
    }

    public function gallerySingle(string $id)
    {
        $gallery = Gallery::findOrFail(decrypt($id));
        $title = $gallery->name;
        return view('gallery-single', compact('gallery', 'title'));
    }

    public function community()
    {
        $title = "Progressive Professional Forum Kuwait Community";
        return view('community', compact('title'));
    }

    public function contact()
    {
        $title = "Progressive Professional Forum Kuwait Contact";
        $officials = Official::all();
        return view('contact', compact('title', 'officials'));
    }

    public function forgotPassword()
    {
        return view('admin.forgot-password');
    }

    public function forgotPasswordEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'
        ]);
        try {
            $user = User::where('email', $request->email)->firstOrFail();
            $token = Str::random(25);
            User::where('id', $user->id)->update(['password_reset_token' => $token]);
            Mail::to($request->email)->send(new ForgotPasswordEmail($user, $token));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput($request->all());
        }
        return redirect()->back()->with('success', "Password reset link has been sent to your registered email.");
    }

    public function resetPassword($token)
    {
        $user = User::where('password_reset_token', $token)->firstOrFail();
        return view('admin.password-reset', compact('user'));
    }

    public function resetPasswordUpdate(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ]);
        try {
            User::where('id', decrypt($request->user_id))->update(['password' => bcrypt($request->password), 'password_reset_token' => NULL]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput($request->all());
        }
        return redirect()->route('login')->with("success", "Password has been reset successfully");
    }

    public function allJobs()
    {
        $jobs = Job::where('status', 'active')->latest()->get();
        $title = "Progressive Professional Forum Kuwait Job / Community";
        return view('jobs', compact('title', 'jobs'));
    }

    public function singleJob($id)
    {
        $job = Job::findOrFail(decrypt($id));
        $recents = Job::where('id', '!=', $job->id)->latest()->limit(10)->get();
        $title = $job->name;
        return view('job-single', compact('job', 'title', 'recents'));
    }

    /*public function test()
    {
        $users = User::leftJoin('memberships as m', 'users.username', 'm.membership_number')->selectRaw("users.id, users.username, users.name, m.user_id")->get();
        foreach ($users as $key => $user) :
            Membership::where('membership_number', $user->username)->update(['user_id' => $user->id]);
        endforeach;
    }*/

    public function sendnotificationemail()
    {
        $members = Membership::whereNotNull('email')->whereNot('email', '')->get();
        dd($members);
        die;
    }
}
