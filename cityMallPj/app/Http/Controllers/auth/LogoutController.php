<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function logout() {
        auth()->logout();

        return redirect('/');
    }
}
