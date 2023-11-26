<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
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
    public function create()
    {
        $title = "Progressive Professional Forum - Membership";
        return view('membership', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'dob' => 'required',
            'email' => 'required|email:rfs,dns|unique:memberships,email',
            'civil_id' => 'required',
            'qualification' => 'required',
            'profession' => 'required',
            'institute' => 'required',
            'organization' => 'required',
            'kw_primary_contact_number' => 'required',
            'kw_secondary_contact_number' => 'required',
            'type' => 'required',
        ]);
        $input = $request->all();
        $input['membership_number'] = generateMembershipNumber()->mn;
        $input['approval_status'] = 'pending';
        Membership::create($input);
        return redirect()->back()->with("success", "Member registration success!");
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
