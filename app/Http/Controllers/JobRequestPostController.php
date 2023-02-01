<?php

namespace App\Http\Controllers;

use App\Models;
use App\Models\JobRequestPost;
use App\Models\Tag;
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
        $tags = Tag::all();
        return view('jobRequestPosts.create', compact('user', 'tags'));
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
            'tags' => 'required|array'
        ]);

        $jobRequestPost = auth()->user()->jobRequests()->create($data);

        $tagIds = [];
        foreach (request()->tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $tagIds[] = $tag->id;
        }

        $jobRequestPost->tags()->attach($tagIds);

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
            'tags' => 'required|array',
        ]);

        $jobRequestPost->update($data);

        $tagIds = [];
        foreach ($request->tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $tagIds[] = $tag->id;
        }

        $jobRequestPost->tags()->sync($tagIds);

        return redirect()->route('profile.show', Auth::user()->id);
    }

    public function show($id)
    {
        $jobRequestPost = Models\JobRequestPost::findOrFail($id);
        return view('jobRequestPosts.show', compact('jobRequestPost'));
    }
}
