<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Official;
use App\Models\Slider;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $title = "Progressive Professional Forum Kuwait";
        $sliders = Slider::where('status', 'published')->orderBy('display_order')->get();
        return view('index', compact('title', 'sliders'));
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
        $officials = Official::all();
        return view('officials', compact('title', 'officials'));
    }

    public function events()
    {
        $title = "Progressive Professional Forum Kuwait Events";
        $officials = Official::all();
        return view('events', compact('title', 'officials'));
    }

    public function publications()
    {
        $title = "Progressive Professional Forum Kuwait Publications";
        $officials = Official::all();
        return view('publications', compact('title', 'officials'));
    }

    public function gallery()
    {
        $title = "Progressive Professional Forum Kuwait Gallery";
        $officials = Official::all();
        return view('gallery', compact('title', 'officials'));
    }

    public function community()
    {
        $title = "Progressive Professional Forum Kuwait Community";
        $officials = Official::all();
        return view('community', compact('title', 'officials'));
    }

    public function contact()
    {
        $title = "Progressive Professional Forum Kuwait Contact";
        $officials = Official::all();
        return view('contact', compact('title', 'officials'));
    }
}
