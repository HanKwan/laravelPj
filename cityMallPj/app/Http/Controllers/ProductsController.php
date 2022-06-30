<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\fresh\FreshGreen;
use Illuminate\Http\Request;
use App\Models\fresh\FreshMeatProduct;
use App\Models\fresh\FreshGreenProduct;
use App\Models\fresh\FreshMeat;
use App\Models\fresh\GreenBrand;
use App\Models\fresh\MeatBrand;

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
        $greenBrands = GreenBrand::all();
        if($request->has('produceType')) {
            $checked = $_GET['produceType'];
            $freshGreenProducts = FreshGreenProduct::whereIn('fresh_green_id', $checked)->get();
        }
        return view('fresh.showGreen', [
            'freshGreenProducts' => $freshGreenProducts,
            'freshGreens' => $freshGreens,
            'greenBrands' => $greenBrands,
        ]);
    }

    // for fresh meat
    public function indexMeat(Request $request) {
        $freshMeatProducts = FreshMeatProduct::all();
        $freshMeats = FreshMeat::all();
        $meatBrands = MeatBrand::all();
        if($request->has('meatType')) {
            $checked = $_GET['meatType'];
            $freshMeatProducts = FreshMeatProduct::whereIn('fresh_meat_id', $checked)->get();
            if($request->has('brandType')) {
                $secondChecked = $_GET['brandType'];
                $freshMeatProducts = FreshMeatProduct::whereIn('brand_name', $secondChecked)->get();
            }
        } else if($request->has('brandType')) {
            $secondChecked = $_GET['brandType'];
            $freshMeatProducts = FreshMeatProduct::whereIn('brand_name', $secondChecked)->get();
        } 
        return view('fresh.showMeat', [
            'freshMeatProducts' => $freshMeatProducts,
            'freshMeats' => $freshMeats,
            'meatBrands' => $meatBrands,
        ]);
    }
}
