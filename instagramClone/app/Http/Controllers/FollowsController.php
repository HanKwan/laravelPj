<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function store(User $user) {
        auth()->user()->following()->attach($user->profile);
        // $user->profile->followers()->attach(auth()->user());    <- this isn't needed
        return back();

    }

    public function destroy(User $user) {
        auth()->user()->following()->detach($user->profile);
        return back();
    }
}
