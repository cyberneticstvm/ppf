<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Gallery;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::withTrashed()->latest()->get();
        return view('admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Category::where('category_type', 2)->pluck('name', 'id');
        //$galleries = Gallery::whereIn('category_id', Category::where('category_type', 2)->pluck('id'))->pluck('name', 'id');
        $galleries = Gallery::pluck('name', 'id');
        return view('admin.event.create', compact('types', 'galleries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,webp|max:1024',
            'category_id' => 'required',
            'display_order' => 'required|numeric',
            'status' => 'required',
            'description' => 'required',
            'date' => 'required',
        ]);
        $input = $request->all();
        $url = uploadFile($request->file('image'), $path = 'event');
        $input['image'] = $url;
        $input['created_by'] = $request->user()->id;
        $input['updated_by'] = $request->user()->id;
        Event::create($input);
        return redirect()->route('event')->with("success", "Event saved successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $types = Category::where('category_type', 2)->pluck('name', 'id');
        //$galleries = Gallery::whereIn('category_id', Category::where('category_type', 2)->pluck('id'))->pluck('name', 'id');
        $galleries = Gallery::pluck('name', 'id');
        $event = Event::findOrFail(decrypt($id));
        return view('admin.event.edit', compact('types', 'galleries', 'event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'sometimes|required|mimes:jpg,jpeg,png,webp|max:1024',
            'category_id' => 'required',
            'display_order' => 'required|numeric',
            'status' => 'required',
            'description' => 'required',
            'date' => 'required',
        ]);
        $input = $request->all();
        if ($request->file('image')) :
            $url = uploadFile($request->file('image'), $path = 'event');
            $input['image'] = $url;
        endif;
        $input['updated_by'] = $request->user()->id;
        Event::findOrFail($id)->update($input);
        return redirect()->route('event')->with("success", "Event updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Event::findOrFail(decrypt($id))->update(['status' => 'inactive']);
        Event::findOrFail(decrypt($id))->delete();
        return redirect()->route('event')->with("success", "Event deleted successfully!");
    }
}
