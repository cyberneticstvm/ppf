<?php

namespace App\Http\Controllers;

use App\Models\Benevolent;
use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Http\Request;

class BenevolentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Benevolent::withTrashed()->latest()->get();
        return view('admin.benevolent.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Category::where('category_type', 4)->pluck('name', 'id');
        //$galleries = Gallery::whereIn('category_id', Category::where('category_type', 2)->pluck('id'))->pluck('name', 'id');
        $galleries = Gallery::pluck('name', 'id');
        return view('admin.benevolent.create', compact('types', 'galleries'));
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
        ]);
        $input = $request->all();
        $url = uploadFile($request->file('image'), $path = 'ppf-kuwait/website/benevolent');
        $input['image'] = $url;
        $input['created_by'] = $request->user()->id;
        $input['updated_by'] = $request->user()->id;
        Benevolent::create($input);
        return redirect()->route('benevolent')->with("success", "Benevolent activity saved successfully!");
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
        $types = Category::where('category_type', 4)->pluck('name', 'id');
        //$galleries = Gallery::whereIn('category_id', Category::where('category_type', 2)->pluck('id'))->pluck('name', 'id');
        $galleries = Gallery::pluck('name', 'id');
        $event = Benevolent::findOrFail(decrypt($id));
        return view('admin.benevolent.edit', compact('types', 'galleries', 'event'));
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
        ]);
        $input = $request->all();
        if ($request->file('image')) :
            $url = uploadFile($request->file('image'), $path = 'ppf-kuwait/website/benevolent');
            $input['image'] = $url;
        endif;
        $input['updated_by'] = $request->user()->id;
        Benevolent::findOrFail($id)->update($input);
        return redirect()->route('benevolent')->with("success", "Benevolent activity updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Benevolent::findOrFail(decrypt($id))->update(['status' => 'inactive']);
        Benevolent::findOrFail(decrypt($id))->delete();
        return redirect()->route('benevolent')->with("success", "Benevolent activity deleted successfully!");
    }
}
