<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function deletedStatus()
    {
        return ($this->deleted_at == NULL) ? '' : '<span class="badge badge-danger">Deleted</span>';
    }

    public function jobStatus()
    {
        return ($this->status == 'active') ? '<span class="badge badge-primary">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
    }
}
