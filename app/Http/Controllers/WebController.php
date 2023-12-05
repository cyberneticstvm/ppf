<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $title = "Progressive Professional Forum";
        $sliders = Slider::where('status', 'published')->orderBy('display_order')->get();
        return view('index', compact('title', 'sliders'));
    }
}
