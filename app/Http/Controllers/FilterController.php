<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use App\Models;

class FilterController extends Controller
{
    public function filterByTags(Request $request)
    {
        $selectedTags = $request->input('tags');

        $jobOfferPosts = JobPost::query()->where('type', 'offer');
        $jobRequestPosts = JobPost::query()->where('type', 'request');

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

        return $this->filterByRegion($jobOfferPosts, $jobRequestPosts, $request);
    }

    public function filterByRegion($jobOfferPosts, $jobRequestPosts, Request $request)
    {
        $selectedRegion = $request->input('region');

        if ($selectedRegion != 'all') {
            $jobOfferPosts = $jobOfferPosts->where('region', $selectedRegion);
            $jobRequestPosts = $jobRequestPosts->where('region', $selectedRegion);
        }

        return $this->filterByEmploymentType($jobOfferPosts, $jobRequestPosts, $request);
    }

    public function filterByEmploymentType($jobOfferPosts, $jobRequestPosts, Request $request)
    {
        $selected = $request->input('employment_type');

        if ($selected != 'all') {
            $jobOfferPosts = $jobOfferPosts->where('employment_type', $selected);
            $jobRequestPosts = $jobRequestPosts->where('employment_type', $selected);
        }

        return $this->filterByWorkplace($jobOfferPosts, $jobRequestPosts, $request);
    }

    public function filterByWorkplace($jobOfferPosts, $jobRequestPosts, Request $request)
    {
        $selectedWorkplace = $request->input('workplace');

        if ($selectedWorkplace != 'all') {
            $jobOfferPosts = $jobOfferPosts->where('workplace', $selectedWorkplace);
            $jobRequestPosts = $jobRequestPosts->where('workplace', $selectedWorkplace);
        }

        return $this->filterByPay($jobOfferPosts, $jobRequestPosts, $request);
    }

    public function filterByPay($jobOfferPosts, $jobRequestPosts, Request $request)
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

        return view('home', compact('jobOfferPosts', 'jobRequestPosts'));
    }
}
