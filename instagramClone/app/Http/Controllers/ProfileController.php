<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(User $user) {
        return view('layouts.profile', [
            'user' => $user,
        ]);
    }

    public function edit(User $user) {
        $this->authorize('update', $user->profile);
        
        return view('layouts.edit', [
            'user' => $user,
        ]);
    }

    public function store(User $user, Request $request) {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'bio' => '',
            'url' => '',
            'profileImage' => 'image',
        ]);
        
        if($request->hasFile('profileImage')) {
            $data['profileImage']= $request->file('profileImage')->store('profile', 'public');
            // $image = Image::make(public_path("/storage/{$imagePath}"))->fit(1000, 1000);
            // $image->save();
        }

        $request->user()->profile()->update($data);

        return redirect('/profile/'.$user->username);
    }
}