<?php

namespace App\Http\Controllers;

use App\Models\About;
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
}
