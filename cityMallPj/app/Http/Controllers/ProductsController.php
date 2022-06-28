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

    public function indexGreen(Request $request) {
        $freshProducts = FreshProduct::all();
        $freshes = Fresh::all();
        // dd($request);
        if($request->has('produceType')) {
            $checked = $_GET['produceType'];
            $freshProducts = FreshProduct::whereIn('fresh_id', $checked)->get();
        }
        return view('fresh.showGreen', [
            'freshProducts' => $freshProducts,
            'freshes' => $freshes,
        ]);
    }
}
