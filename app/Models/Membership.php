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

    public function showMobile()
    {
        return ($this->show_mobile) ? $this->kw_primary_contact_number : '';
    }

    public function showEmail()
    {
        return ($this->show_email) ? $this->email : '';
    }

    public function specializations()
    {
        return $this->belongsTo(Specialization::class, 'specialization', 'id');
    }

    public function qualifications()
    {
        return $this->belongsTo(Qualification::class, 'qualification', 'id');
    }

    public function members()
    {
        return $this->belongsTo(Membership::class, 'referred_by', 'id');
    }
}
