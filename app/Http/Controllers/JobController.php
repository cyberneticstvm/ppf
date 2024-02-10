<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::withTrashed()->latest()->get();
        return view('admin.job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::pluck('name', 'id');
        return view('admin.job.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'sometimes|required|mimes:jpg,jpeg,png,webp|max:1024',
            'document' => 'sometimes|required|mimes:pdf,doc,docx,xlsx|max:1024',
            'country_id' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);
        $input = $request->all();
        if ($request->file('image')) :
            $url = uploadFile($request->file('image'), $path = 'ppf-kuwait/website/job/image');
            $input['image'] = $url;
        endif;
        if ($request->file('document')) :
            $url = uploadFile($request->file('document'), $path = 'ppf-kuwait/website/job/document');
            $input['document'] = $url;
        endif;
        $input['created_by'] = $request->user()->id;
        $input['updated_by'] = $request->user()->id;
        Job::create($input);
        return redirect()->route('job')->with("success", "Job saved successfully!");
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
        $countries = Country::pluck('name', 'id');
        $job = Job::findOrFail(decrypt($id));
        return view('admin.job.edit', compact('countries', 'job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'sometimes|required|mimes:jpg,jpeg,png,webp|max:1024',
            'document' => 'sometimes|required|mimes:pdf,doc,docx,xlsx|max:1024',
            'country_id' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);
        $input = $request->all();
        if ($request->file('image')) :
            $url = uploadFile($request->file('image'), $path = 'ppf-kuwait/website/job/image');
            $input['image'] = $url;
        endif;
        if ($request->file('document')) :
            $url = uploadFile($request->file('document'), $path = 'ppf-kuwait/website/job/document');
            $input['document'] = $url;
        endif;
        $input['updated_by'] = $request->user()->id;
        Job::findOrFail($id)->update($input);
        return redirect()->route('job')->with("success", "Job updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Job::findOrFail(decrypt($id))->update(['status' => 'inactive']);
        Job::findOrFail(decrypt($id))->delete();
        return redirect()->route('job')->with("success", "Job deleted successfully!");
    }
}
