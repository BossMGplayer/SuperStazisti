<?php

namespace App\Http\Controllers;

use App\Models\JobRequestTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobRequestTagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store()
    {
        $data = request()->validate([
            'tag' => 'required|string',
        ]);

        try {
            auth()->user()->tags()->create($data);
            toastr()->success('New tag added successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 19) {
                toastr()->error('Tag already exists');
            }
        }

        return redirect()->route('profile.show', Auth::user()->id);
    }

    public function delete($id)
    {
        JobRequestTag::destroy($id);
        return redirect()->route('profile.show', Auth::user()->id);
    }
}
