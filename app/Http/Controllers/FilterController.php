<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use App\Models;

class FilterController extends Controller
{
    public function filterPosts(Request $request)
    {
        // Retrieve the filter parameters from the request
        $tags = $request->input('tags');
        $minPay = $request->input('min_pay');
        $maxPay = $request->input('max_pay');
        $region = $request->input('region');
        $employmentType = $request->input('employment_type');
        $workplace = $request->input('workplace');


        // Check if any filter parameters are selected
        if ($tags || $minPay || $maxPay || $region || $employmentType || $workplace) {
            // Apply the selected filters
            $filteredPosts = \App\Models\JobPost::query();

            $tags = is_array($tags) ? $tags : explode(',', $tags);
            $tags = array_map('trim', $tags);

            if ($tags) {
                $filteredPosts->where(function ($query) use ($tags) {
                    foreach ($tags as $tag) {
                        $query->orWhere('tags', 'LIKE', '%' . $tag . '%');
                    }
                });
            }

            if ($minPay && $maxPay) {
                $filteredPosts->whereBetween('pay', [$minPay, $maxPay]);
            } elseif ($minPay) {
                $filteredPosts->where('pay', '>=', $minPay);
            } elseif ($maxPay) {
                $filteredPosts->where('pay', '<=', $maxPay);
            }

            if ($region != "all") {
                $filteredPosts->where('region', $region);
            }

            if ($employmentType != "all") {
                $filteredPosts->where('employment_type', $employmentType);
            }

            if ($workplace != "all") {
                $filteredPosts->where('workplace', $workplace);
            }

            // Get the filtered job posts
            $jobPosts = $filteredPosts->get();
        } else {
            // No filter parameters selected, return all job posts
            $jobPosts = \App\Models\JobPost::all();
        }

        // Return the job offers to the view

        return view('home', compact('jobPosts'));
    }
}
