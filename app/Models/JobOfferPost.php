<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOfferPost extends Model
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
        'type',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
