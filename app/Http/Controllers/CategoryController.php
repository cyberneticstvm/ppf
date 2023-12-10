<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryType;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats = Category::withTrashed()->latest()->get();
        return view('admin.category.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = CategoryType::pluck('name', 'id');
        return view('admin.category.create', compact('types'));
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
        $url = uploadFile($request->file('image'), $path = 'ppf-kuwait/website/category');
        $input['image'] = $url;
        $input['created_by'] = $request->user()->id;
        $input['updated_by'] = $request->user()->id;
        Category::create($input);
        return redirect()->route('category')->with("success", "Category saved successfully!");
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
        $category = Category::findOrFail(decrypt($id));
        $types = CategoryType::pluck('name', 'id');
        return view('admin.category.edit', compact('types', 'category'));
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
            $url = uploadFile($request->file('image'), $path = 'ppf-kuwait/website/category');
            $input['image'] = $url;
        endif;
        $input['updated_by'] = $request->user()->id;
        Category::findOrFail($id)->update($input);
        return redirect()->route('category')->with("success", "Category updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::findOrFail(decrypt($id))->update(['status' => 'inactive']);
        Category::findOrFail(decrypt($id))->delete();
        return redirect()->route('category')->with("success", "Category deleted successfully!");
    }
}
