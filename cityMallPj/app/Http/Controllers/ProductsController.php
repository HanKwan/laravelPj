<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        return view('home.index');
    }

    public function show() {
        return view('fresh.index');
    }
}
