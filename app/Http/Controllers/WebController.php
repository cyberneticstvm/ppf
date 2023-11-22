<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $title = "Progressive Professional Forum";
        return view('index', compact('title'));
    }
}
