<?php

use Illuminate\Support\Facades\Storage;

function status()
{
    return array('active' => 'Active', 'inactive' => 'Inactive');
}

function uploadFile($file, $path)
{
    $doc = Storage::disk('s3')->put($path, $file);
    $url = Storage::disk('s3')->url($doc);
    return $url;
}
