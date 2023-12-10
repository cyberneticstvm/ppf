<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Publication;
use Illuminate\Http\Request;

class Publicationcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pubs = Publication::withTrashed()->latest()->get();
        return view('admin.publication.index', compact('pubs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Category::where('category_type', 3)->pluck('name', 'id');
        return view('admin.publication.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,webp|max:1024',
            'document' => 'sometimes|required|mimes:pdf,doc,docx,xlsx|max:1024',
            'video' => 'sometimes|required|mimes:mp4|max:10240',
            'category_id' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);
        $input = $request->all();
        $url = uploadFile($request->file('image'), $path = 'ppf-kuwait/website/publication/image');
        $input['image'] = $url;
        if ($request->file('document')) :
            $url = uploadFile($request->file('document'), $path = 'ppf-kuwait/website/publication/document');
            $input['document'] = $url;
        endif;
        if ($request->file('video')) :
            $url = uploadFile($request->file('video'), $path = 'ppf-kuwait/website/publication/video');
            $input['video'] = $url;
        endif;
        $input['created_by'] = $request->user()->id;
        $input['updated_by'] = $request->user()->id;
        Publication::create($input);
        return redirect()->route('publication')->with("success", "Publication saved successfully!");
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
        $types = Category::where('category_type', 3)->pluck('name', 'id');
        $pub = Publication::findOrFail(decrypt($id));
        return view('admin.publication.edit', compact('types', 'pub'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'sometimes|required|mimes:jpg,jpeg,png,webp|max:1024',
            'document' => 'sometimes|required|mimes:pdf,doc,docx,xlsx|max:1024',
            'video' => 'sometimes|required|mimes:mp4|max:10240',
            'category_id' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);
        $input = $request->all();
        if ($request->file('image')) :
            $url = uploadFile($request->file('image'), $path = 'ppf-kuwait/website/publication/image');
            $input['image'] = $url;
        endif;
        if ($request->file('document')) :
            $url = uploadFile($request->file('document'), $path = 'ppf-kuwait/website/publication/document');
            $input['document'] = $url;
        endif;
        if ($request->file('video')) :
            $url = uploadFile($request->file('video'), $path = 'ppf-kuwait/website/publication/video');
            $input['video'] = $url;
        endif;
        $input['updated_by'] = $request->user()->id;
        Publication::findOrFail($id)->update($input);
        return redirect()->route('publication')->with("success", "Publication updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Publication::findOrFail(decrypt($id))->update(['status' => 'inactive']);
        Publication::findOrFail(decrypt($id))->delete();
        return redirect()->route('publication')->with("success", "Publication deleted successfully!");
    }
}
