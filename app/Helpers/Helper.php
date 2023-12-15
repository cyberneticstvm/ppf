<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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
    return array('top' => 'Top', 'right' => 'Right', 'bottom' => 'Bottom', 'left' => 'Left', 'floating' => 'Floating');
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
    return DB::table('memberships')->where('type', $type)->selectRaw("CONCAT_WS('', '$label', IFNULL(MAX(CAST(SUBSTRING_INDEX(membership_number, '-', -1) AS INTEGER))+1, 1001)) AS mn")->first();
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
