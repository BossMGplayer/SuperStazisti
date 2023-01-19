<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LanguageController extends Controller
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
        ]);

        auth()->user()->languages()->create($data);

        return redirect()->route('profile.show', Auth::user()->id);
    }

    public function delete($id)
    {
        Language::destroy($id);
    }
}
