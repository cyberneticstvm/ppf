<?php

use App\Models\Logo;
use App\Models\Membership;
use App\Models\ScrollingMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


function logo()
{
    return Logo::findOrFail(1);
}

function scrollMessage()
{
    return ScrollingMessage::where('status', 'active')->latest()->first();
}

function status()
{
    return array('active' => 'Active', 'inactive' => 'Inactive');
}

function maritalStatus()
{
    return array('single' => 'Single', 'married' => 'Married');
}

function booleanStatus()
{
    return array('1' => 'Yes', '0' => 'No');
}

function renewalStatus()
{
    return array('new' => 'New Application', 'pending' => 'Pending', 'renewed' => 'Renewed');
}

function positions()
{
    return array('top' => 'Top', 'bottom' => 'Bottom', 'floating' => 'Floating');
}

function membershipStatus()
{
    return array('approved' => 'Approved', 'rejected' => 'Rejected', 'pending' => 'Pending');
}

function membershipTypes()
{
    return array('primary' => 'Primary', 'associate' => 'Associate', 'overseas' => 'Overseas');
}

function countrycodes()
{
    return array('+91' => 'India (+91)', '+965' => 'Kuwait (+965)', '+971' => 'UAE (+971)', '+968' => 'Oman (+968)', '+974' => 'Qatar (+974)');
}

function generateMembershipNumber($type)
{
    $label = 'PM';
    if ($type == 'associate')
        $label = 'AM';
    if ($type == 'overseas')
        $label = 'EM';
    return DB::table('memberships')->where('type', $type)->selectRaw("CONCAT_WS('', '$label', IFNULL(MAX(CAST(SUBSTRING(membership_number, 3) AS INTEGER))+1, 1001)) AS mn")->first();
}

function uploadFile($file, $path)
{
    /*$doc = Storage::disk('s3')->put($path, $file);
    $url = Storage::disk('s3')->url($doc);
    return $url;*/
    $fname = time() . '_' . $file->getClientOriginalName();
    $file->storeAs($path, $fname, 'public');
    return '/storage/' . $path . '/' . $fname;
}

function member()
{
    return Membership::where('user_id', Auth::id())->firstOrFail();
}

function members()
{
    return Membership::all();
}
