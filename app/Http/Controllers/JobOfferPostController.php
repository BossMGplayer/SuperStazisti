<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobOfferPostController extends Controller
{
    public function create()
    {
        return view('jobOfferPosts.create');
    }
}
