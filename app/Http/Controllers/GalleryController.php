<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryType;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::withTrashed()->latest()->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Category::where('category_type', 1)->pluck('name', 'id');
        return view('admin.gallery.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,webp|max:1024',
            'category_type' => 'required',
            'display_order' => 'required|numeric',
            'status' => 'required',
        ]);
        $input = $request->all();
        $url = uploadFile($request->file('image'), $path = 'gallery');
        $input['image'] = $url;
        $input['created_by'] = $request->user()->id;
        $input['updated_by'] = $request->user()->id;
        Gallery::create($input);
        return redirect()->route('gallery')->with("success", "Gallery saved successfully!");
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
        $gallery = Gallery::findOrFail(decrypt($id));
        $types = Category::where('category_type', 1)->pluck('name', 'id');
        return view('admin.gallery.edit', compact('types', 'gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'sometimes|required|mimes:jpg,jpeg,png,webp|max:1024',
            'category_type' => 'required',
            'display_order' => 'required|numeric',
            'status' => 'required',
        ]);
        $input = $request->all();
        if ($request->file('image')) :
            $url = uploadFile($request->file('image'), $path = 'gallery');
            $input['image'] = $url;
        endif;
        $input['updated_by'] = $request->user()->id;
        Gallery::findOrFail($id)->update($input);
        return redirect()->route('gallery')->with("success", "Gallery updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gallery::findOrFail(decrypt($id))->update(['status' => 'inactive']);
        Gallery::findOrFail(decrypt($id))->delete();
        return redirect()->route('gallery')->with("success", "Gallery deleted successfully!");
    }
}
