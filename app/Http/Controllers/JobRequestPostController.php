<?php

namespace App\Http\Controllers;

use App\Models;
use App\Models\JobRequestPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobRequestPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $user = auth()->user();
        return view('jobRequestPosts.create', compact('user'));
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
            'phone_number' => 'required|string',
            'tags' => 'nullable'
        ]);

        $jobRequestPost = auth()->user()->jobRequests()->create(array_merge($data, [
            'tags' => implode(',', request()->input('tags', []))
        ]));

        return redirect()->route('profile.show', Auth::user()->id);
    }

    public function update(Request $request, $id)
    {
        $jobRequestPost = JobRequestPost::findOrFail($id);

        if (auth()->user()->id !== $jobRequestPost->user_id) {
            return redirect()->route('profile.show', Auth::user()->id);
        }

        $data = $request->validate([
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
            'phone_number' => 'required|string',
            'tags'
        ]);

        $jobRequestPost->update($data);

        return redirect()->route('profile.show', Auth::user()->id);
    }

    public function show($id)
    {
        $jobRequestPost = Models\JobRequestPost::findOrFail($id);
        $tagsArray = [];

        if ($jobRequestPost->tags && $jobRequestPost->tags !== '') {
            $tagsArray = explode(',', $jobRequestPost->tags);
        }

        return view('jobRequestPosts.show', compact('jobRequestPost', 'tagsArray'));
    }

    public function getFiltered(Request $request)
    {
        $selectedTags = $request->input('selected_tags');
        $selectedTags = explode(',', $selectedTags);
        $filteredJRPosts = Models\JobRequestPost::where(function ($query) use ($selectedTags) {
            foreach ($selectedTags as $tag) {
                $query->orWhere('tags', 'LIKE', '%' . $tag . '%');
            }
        })->get();

        return view('homeFiltered', compact($filteredJRPosts));
    }

}
