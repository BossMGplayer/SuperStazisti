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

    public function store()
    {
        $data = request()->validate([
            'language' => 'required|string',
            'skill' => 'required|string|in:beginner,intermediate,expert,fluent,native,proficient',
        ]);

        try {
            auth()->user()->languages()->create($data);
            toastr()->success('New language added successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 19) {
                toastr()->error('Language already exists');
            }
        }

        return redirect()->route('profile.show', Auth::user()->id);
    }

    public function delete($id)
    {
        Language::destroy($id);
        return redirect()->route('profile.show', Auth::user()->id);
    }
}
