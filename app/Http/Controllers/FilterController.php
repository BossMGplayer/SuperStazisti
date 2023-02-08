<?php

namespace App\Http\Controllers;

use App\Models\JobOfferPost;
use App\Models\JobRequestPost;
use Illuminate\Http\Request;
use App\Models;

class FilterController extends Controller
{
    public function FilterByTags(Request $request)
    {
        $selectedTags = $request->input('tags');

        $jobOfferPosts = JobOfferPost::where(function($query) use ($selectedTags) {
            foreach ($selectedTags as $tag) {
                $query->orWhere('tags', 'like', '%' . $tag . '%');
            }
        })->get();

        $jobRequestPosts = JobRequestPost::where(function($query) use ($selectedTags) {
            foreach ($selectedTags as $tag) {
                $query->orWhere('tags', 'like', '%' . $tag . '%');
            }
        })->get();

        return view('homeFiltered', compact('jobOfferPosts', 'jobRequestPosts'));
    }

}

