<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'language',
        'skill'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
