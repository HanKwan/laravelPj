<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        return view('layouts.edit', [
            'user' => $user,
        ]);
    }

    public function store(User $user) {

    }
}
