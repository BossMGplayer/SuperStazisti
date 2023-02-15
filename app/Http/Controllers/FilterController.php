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

        $jobOfferPosts = JobOfferPost::query();
        $jobRequestPosts = JobRequestPost::query();

        if (!empty($selectedTags)) {
            $jobOfferPosts = $jobOfferPosts->where(function ($query) use ($selectedTags) {
                foreach ($selectedTags as $tag) {
                    $query->orWhere('tags', 'like', '%' . $tag . '%');
                }
            });

            $jobRequestPosts = $jobRequestPosts->where(function ($query) use ($selectedTags) {
                foreach ($selectedTags as $tag) {
                    $query->orWhere('tags', 'like', '%' . $tag . '%');
                }
            });
        }

        return $this->FilterByRegion($jobOfferPosts, $jobRequestPosts, $request);
    }


    public function FilterByRegion($jobOfferPosts, $jobRequestPosts, Request $request)
    {
        $selectedRegion = $request->input('region');
        $allRegions = $request->input('all-regions');

        if ($allRegions != 'all-regions')
        {
            $jobOfferPosts = $jobOfferPosts->where('region', $selectedRegion);
            $jobRequestPosts = $jobRequestPosts->where('region', $selectedRegion);
        }

        return $this->FilterByPay($jobOfferPosts, $jobRequestPosts, $request);
    }

    public function FilterByPay($jobOfferPosts, $jobRequestPosts, Request $request)
    {
        $min_pay = $request->input('min_pay');
        $max_pay = $request->input('max_pay');
        $min_pay = ($min_pay) ? $min_pay : 0;
        $max_pay = ($max_pay) ? $max_pay : PHP_INT_MAX;

        if (!empty($min_pay) || !empty($max_pay)) {
            $jobOfferPosts = $jobOfferPosts->whereBetween('pay', [$min_pay, $max_pay]);
            $jobRequestPosts = $jobRequestPosts->whereBetween('pay', [$min_pay, $max_pay]);
        }

        $jobOfferPosts = $jobOfferPosts->get();
        $jobRequestPosts = $jobRequestPosts->get();

        return view('homeFiltered', compact('jobOfferPosts', 'jobRequestPosts'));
    }
}
