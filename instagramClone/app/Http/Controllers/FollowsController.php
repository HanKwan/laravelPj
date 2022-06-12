<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function store(User $user) {
        auth()->user()->following()->attach($user->profile->user_id);
        return back();

    }

    public function destroy(User $user) {
        auth()->user()->following()->detach($user->profile);
        return back();
    }
}
