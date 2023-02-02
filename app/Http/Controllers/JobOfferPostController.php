<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models;

class JobOfferPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $user = auth()->user();
        return view('jobOfferPosts.create', compact('user'));
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
            'email' => 'required|email',
            'phone_number' => 'required|string'
        ]);

        $jobOfferPost = auth()->user()->jobOffers()->create($data);

        return redirect()->route('profile.show', Auth::user()->id);
    }

    public function show($id)
    {
        $jobOfferPost = Models\JobOfferPost::findOrFail($id);
        return view('jobOfferPosts.show', compact('jobOfferPost'));
    }
}
