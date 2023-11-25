<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScrollingMessage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'message',
        'url',
        'status',
        'created_by',
        'updated_by',
    ];

    public function deletedStatus()
    {
        return ($this->deleted_at == NULL) ? '' : '<span class="badge badge-danger">Deleted</span>';
    }

    public function messageStatus()
    {
        return ($this->status == 'active') ? '<span class="badge badge-primary">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
    }
}
