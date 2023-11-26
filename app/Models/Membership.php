<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membership extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = ['approved_date' => 'datetime', 'next_renewal_date' => 'datetime', 'dob' => 'datetime', 'doj' => 'datetime'];

    public function deletedStatus()
    {
        return ($this->deleted_at == NULL) ? '' : '<span class="badge badge-danger">Deleted</span>';
    }
}
