<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $images = GalleryImage::where('gallery_id', decrypt($id))->latest()->get();
        $gallery = Gallery::findOrFail(decrypt($id));
        return view('admin.gallery.image.create', compact('images', 'gallery'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'images' => 'required',
            'display_order' => 'required|numeric',
            'status' => 'required',
        ]);
        $input = $request->except(array('name', 'images'));
        $images = $request->file('images');
        foreach ($images as $key => $item) :
            $url = uploadFile($item, $path = 'ppf-kuwait/website/gallery/images/' . $request->gallery_id);
            $input['image'] = $url;
            $input['created_by'] = $request->user()->id;
            $input['updated_by'] = $request->user()->id;
            GalleryImage::create($input);
        endforeach;
        return redirect()->back()->with("success", "Gallery image saved successfully!");
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
        $image = GalleryImage::findOrFail(decrypt($id));
        $gallery = Gallery::findOrFail($image->gallery_id);
        return view('admin.gallery.image.edit', compact('image', 'gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'image' => 'sometimes|required|mimes:jpg,jpeg,png,webp|max:1024',
            'display_order' => 'required|numeric',
            'status' => 'required',
        ]);
        $input = $request->except(array('name'));
        if ($request->file('image')) :
            $url = uploadFile($request->file('image'), $path = 'ppf-kuwait/website/gallery/images/' . $request->gallery_id);
            $input['image'] = $url;
        endif;
        $input['updated_by'] = $request->user()->id;
        GalleryImage::findOrFail($id)->update($input);
        return redirect()->route('gallery.image.create', encrypt($request->gallery_id))->with("success", "Gallery image updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gi = GalleryImage::findOrFail(decrypt($id));
        $gi->update(['status' => 'inactive']);
        $gi->delete();
        return redirect()->route('gallery.image.create', encrypt($gi->gallery_id))->with("success", "Gallery deleted successfully!");
    }
}
