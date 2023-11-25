<?php

namespace App\Http\Controllers;

use App\Models\ScrollingMessage;
use Illuminate\Http\Request;

class ScrollingMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = ScrollingMessage::withTrashed()->latest()->get();
        return view('admin.scrolling.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.scrolling.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'message' => 'required',
            'status' => 'required',
        ]);
        $input = $request->all();
        $input['created_by'] = $request->user()->id;
        $input['updated_by'] = $request->user()->id;
        ScrollingMessage::create($input);
        return redirect()->route('scrolling')->with("success", "Scrolling Message saved successfully!");
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
        $message = ScrollingMessage::findOrFail(decrypt($id));
        return view('admin.scrolling.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'message' => 'required',
            'status' => 'required',
        ]);
        $input = $request->all();
        $input['created_by'] = $request->user()->id;
        $input['updated_by'] = $request->user()->id;
        ScrollingMessage::findOrFail($id)->update($input);
        return redirect()->route('scrolling')->with("success", "Scrolling Message updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ScrollingMessage::findOrFail(decrypt($id))->update(['status' => 'inactive']);
        ScrollingMessage::findOrFail(decrypt($id))->delete();
        return redirect()->route('scrolling')->with("success", "Scrolling Message deleted successfully!");
    }
}
