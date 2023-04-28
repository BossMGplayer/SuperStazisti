<?php

namespace App\Http\Controllers;

use App\Mail\NewPostMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewPostNotification;

class JobPostController extends Controller
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
            'type' => 'required|string',
            'company_name' => 'nullable',
            'job_title' => 'required|string',
            'workplace' => 'required',
            'employment_type' => 'required',
            'address' => 'required|string',
            'pay' => 'required|integer|min:0',
            'description' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'tags' => 'nullable',
            'region' => 'required|string',
        ]);

        $jobPost = auth()->user()->posts()->create(array_merge($data, [
            'tags' => implode(',', request()->input('tags', []))
        ]));

        $sender = $jobPost->user;
        $followers = $sender->profile->followers;
        if ($followers->count() > 0) {
            foreach ($followers as $follower) {
                Mail::to($follower->email)->send(new NewPostMail($jobPost, $sender, $follower));
                $follower->notify(new NewPostNotification($jobPost, $sender, $follower, 'new_post'));
            }
        }

        return redirect()->route('profile.show', Auth::user()->id);
    }

    public function update(Request $request, $id)
    {
        $jobPost = Models\JobPost::findOrFail($id);

        if (auth()->user()->id !== $jobPost->user_id) {
            return redirect()->route('profile.show', Auth::user()->id);
        }

        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'type' => 'required|string',
            'company_name' => 'nullable',
            'job_title' => 'required|string',
            'workplace' => 'required',
            'employment_type' => 'required',
            'address' => 'required|string',
            'pay' => 'required|integer|min:0',
            'description' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'tags',
            'region' => 'required|string',
        ]);

        $jobPost->update($data);

        return redirect()->route('profile.show', Auth::user()->id);
    }

    public function show($id)
    {
        $jobPost = Models\JobPost::findOrFail($id);

        $tagsArray = [];
        if ($jobPost->tags && $jobPost->tags !== '') {
            $tagsArray = explode(',', $jobPost->tags);
        }

        return view('jobOfferPosts.show', compact('jobPost', 'tagsArray'));
    }

    public function delete($id)
    {
        Models\JobPost::destroy($id);
        return redirect()->route('profile.show', Auth::user()->id);
    }
}
