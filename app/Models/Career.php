<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Career extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'company', 'location', 'description', 'poster_path', 'application_url', 'closing_date', 'status', 'created_by', 'updated_by'];

    protected $casts = ['closing_date' => 'date'];

    public function getPosterUrlAttribute(): ?string
    {
        return $this->poster_path ? route($this->status === 'published' ? 'careers.poster' : 'admin.careers.poster', $this->id) : null;
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
