<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisement extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function deletedStatus()
    {
        return ($this->deleted_at == NULL) ? '' : '<span class="badge badge-danger">Deleted</span>';
    }

    public function adStatus()
    {
        return ($this->status == 'active') ? '<span class="badge badge-primary">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
    }
}
