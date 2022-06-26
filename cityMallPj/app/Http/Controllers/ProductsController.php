<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Fresh;
use App\Models\FreshProduct;
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
        $freshProducts = FreshProduct::all();
        return view('fresh.showGreen', [
            'freshProducts' => $freshProducts,
        ]);
    }
}
