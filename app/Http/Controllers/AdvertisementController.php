<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = Advertisement::withTrashed()->latest()->get();
        return view('admin.advertisement.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,webp|max:1024',
            'status' => 'required',
            'description' => 'required',
            'position' => 'required',
        ]);
        $input = $request->all();
        $url = uploadFile($request->file('image'), $path = 'advertisement');
        $input['image'] = $url;
        $input['created_by'] = $request->user()->id;
        $input['updated_by'] = $request->user()->id;
        Advertisement::create($input);
        return redirect()->route('advertisement')->with("success", "Advertisement saved successfully!");
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
        $ad = Advertisement::findOrFail(decrypt($id));
        return view('admin.advertisement.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'sometimes|required|mimes:jpg,jpeg,png,webp|max:1024',
            'status' => 'required',
            'description' => 'required',
            'position' => 'required',
        ]);
        $input = $request->all();
        if ($request->file('image')) :
            $url = uploadFile($request->file('image'), $path = 'event');
            $input['image'] = $url;
        endif;
        $input['updated_by'] = $request->user()->id;
        Advertisement::findOrFail($id)->update($input);
        return redirect()->route('advertisement')->with("success", "Advertisement updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Advertisement::findOrFail(decrypt($id))->update(['status' => 'inactive']);
        Advertisement::findOrFail(decrypt($id))->delete();
        return redirect()->route('advertisement')->with("success", "Advertisement deleted successfully!");
    }
}
