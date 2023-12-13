<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Benevolent;
use App\Models\Category;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Official;
use App\Models\Publication;
use App\Models\Slider;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $title = "Progressive Professional Forum Kuwait";
        $sliders = Slider::where('status', 'published')->orderBy('display_order')->get();
        $events = Event::where('status', 'active')->orderBy('display_order')->get();
        $gallery = Gallery::where('status', 'active')->orderBy('display_order')->get();
        $category = Category::where('status', 'active')->get();
        return view('index', compact('title', 'sliders', 'events', 'gallery', 'category'));
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
        return view('gallery-single', compact('gallery', 'title', 'gallery'));
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
}
