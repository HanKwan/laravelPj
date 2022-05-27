<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index() {
        $posts = Post::paginate(2);
        return view('layouts.home', ['posts' => $posts]);
    }
}
