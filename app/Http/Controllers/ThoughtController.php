<?php

namespace App\Http\Controllers;

use App\Models\Thought;
use Illuminate\Http\Request;

class ThoughtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $thoughts = Thought::withTrashed()->latest()->get();
        return view('admin.thought.index', compact('thoughts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email:rfs,dns',
            'thought' => 'required',
        ]);
        $input = $request->all();
        $input['status'] = 'draft';
        Thought::create($input);
        return redirect()->back()->with("success", "Thought submitted successfully!");
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
        $thought = Thought::findOrFail(decrypt($id));
        return view('admin.thought.edit', compact('thought'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'thought' => 'required',
            'status' => 'required',
        ]);
        $input = $request->all();
        Thought::findOrFail($id)->update($input);
        return redirect()->route('thought')->with("success", "Thought updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Thought::findOrFail(decrypt($id))->delete();
        return redirect()->back()->with("success", "Thought deleted successfully!");
    }
}
