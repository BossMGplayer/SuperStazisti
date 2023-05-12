<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function Search(Request $request)
    {
        $title = $request->input('title');

        $jobOfferPosts = JobPost::query()->where('type', 'offer');
        $jobRequestPosts = JobPost::query()->where('type', 'request');

        if (!is_null($title)) {
            $jobOfferPosts = JobPost::where('job_title', 'like' ,'%'.$title.'%')->get();
            $jobRequestPosts = JobPost::where('job_title', 'like' ,'%'.$title.'%')->get();
        }

        return view('homeFiltered', compact('jobOfferPosts', 'jobRequestPosts'));
    }
}
