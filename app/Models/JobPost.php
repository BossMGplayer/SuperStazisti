<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'type',
        'company_name',
        'job_title',
        'workplace',
        'employment_type',
        'address',
        'pay',
        'description',
        'email',
        'phone_number',
        'tags',
        'region'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    public function scopeWithTags($query, $tags)
    {
        return $query->where(function ($query) use ($tags) {
            foreach ($tags as $tag) {
                $query->where('tags', 'like', '%'.$tag.'%');
            }
        });
    }
    */
}

