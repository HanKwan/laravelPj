<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    public function __construct()
    {
        return $this->middleware('guest');
    }

    public function index() {
        return view('auth.login');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if(!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('status', 'Incorrect login');
        }

        return redirect('/');
    }
}
