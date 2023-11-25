<?php

use Illuminate\Support\Facades\Storage;

function status()
{
    return array('active' => 'Active', 'inactive' => 'Inactive');
}

function positions()
{
    return array('top' => 'Top', 'right' => 'Right', 'bottom' => 'Bottom', 'left' => 'Left', 'floating' => 'Floating');
}

function uploadFile($file, $path)
{
    $doc = Storage::disk('s3')->put($path, $file);
    $url = Storage::disk('s3')->url($doc);
    return $url;
}
