<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\FreshGreen;
use Illuminate\Http\Request;
use App\Models\FreshMeatProduct;
use App\Models\FreshGreenProduct;
use App\Models\FreshMeat;

class ProductsController extends Controller
{
    // home
    public function index() {
        $categories = Categories::all();
        return view('home.index', ['categories' => $categories]);
    }

    // show fresh
    public function show() {
        $categories = Categories::all();
        return view('fresh.index', ['categories' => $categories]);
    }

    // for fresh green
    public function indexGreen(Request $request) {
        $freshGreenProducts = FreshGreenProduct::all();
        $freshGreens = FreshGreen::all();
        if($request->has('produceType')) {
            $checked = $_GET['produceType'];
            $freshGreenProducts = FreshGreenProduct::whereIn('fresh_green_id', $checked)->get();
        }
        return view('fresh.showGreen', [
            'freshGreenProducts' => $freshGreenProducts,
            'freshGreens' => $freshGreens,
        ]);
    }

    // for fresh meat
    public function indexMeat(Request $request) {
        $freshMeatProducts = FreshMeatProduct::all();
        $freshMeats = FreshMeat::all();
        // foreach($freshMeatProducts as $product) {
        //     dd($product->brand_name);
        // }
        if($request->has('meatType')) {
            $checked = $_GET['meatType'];
            $freshMeatProducts = FreshMeatProduct::whereIn('fresh_meat_id', $checked)->get();
        }
        return view('fresh.showMeat', [
            'freshMeatProducts' => $freshMeatProducts,
            'freshMeats' => $freshMeats,
        ]);
    }
}
