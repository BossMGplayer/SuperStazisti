<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRequestPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'company_name',
        'job_title',
        'workplace',
        'employment_type',
        'address',
        'pay',
        'description',
        'email',
        'phone_number',
        'tags'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Set the categories
     *
     */
    public function setCatAttribute($value)
    {
        $this->attributes['tags'] = json_encode($value);
    }

    /**
     * Get the categories
     *
     */
    public function getCatAttribute($value)
    {
        return $this->attributes['tags'] = json_decode($value);
    }

    public function scopeWithTags($query, $tags)
    {
        return $query->where(function ($query) use ($tags) {
            foreach ($tags as $tag) {
                $query->where('tags', 'like', '%'.$tag.'%');
            }
        });
    }

}
