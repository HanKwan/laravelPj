<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Fresh;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        $categories = Categories::all();
        return view('home.index', ['categories' => $categories]);
    }

    public function show() {
        $categories = Categories::all();
        return view('fresh.index', ['categories' => $categories]);
    }

    public function indexGreen() {
        $veges = Fresh::find(1);
        $fruits = Fresh::find(2);
        // dd($veges);
        return view('fresh.showGreen', [
            'veges' => $veges,
            'fruits' => $fruits,
        ]);
    }
}
