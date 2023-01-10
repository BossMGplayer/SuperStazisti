<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class JobOfferPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create()
    {
        return view('jobOfferPosts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company_name' => 'nullable',
            'job_title' => 'required|string',
            'workplace' => 'required',
            'employment_type' => 'required',
            'address' => 'required|string',
            'pay' => 'required|integer|min:0',
            'description' => 'required|string',
        ]);


        auth()->user()->jobOffers()->create($data);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Models\JobOfferPost $jobOfferPost)
    {
        return view('jobOfferPosts.show', compact('jobOfferPost'));
    }
}
