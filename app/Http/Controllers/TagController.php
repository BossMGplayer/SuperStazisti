<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function taggable()
    {
        return $this->morphTo();
    }
}
