<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Categories;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Models\fresh\FreshMeat;
use App\Models\fresh\MeatBrand;
use App\Models\fresh\FreshGreen;
use App\Models\fresh\GreenBrand;
use App\Models\fresh\FreshMeatProduct;
use App\Models\fresh\FreshGreenProduct;

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
        $carts = Cart::all();
        $freshGreenProducts = Product::whereIn('product_type_id', [1, 2])->get();
        $freshGreens = ProductType::whereIn('id', [1, 2])->get();
        // $greenBrands = Brand::all();
        if($request->has('produceType')) {
            $checked = $_GET['produceType'];
            $freshGreenProducts = Product::whereIn('product_type_id', $checked)->get();
            if($request->has('brandType')) {
                $secondChecked = $_GET['brandType'];
                $freshGreenProducts = Product::whereIn('brand_name', $secondChecked)->get();
            }
        } else if($request->has('brandType')) {
            $secondChecked = $_GET['brandType'];
            $freshGreenProducts = Product::whereIn('brand_name', $secondChecked)->get();
        }
        return view('fresh.showGreen', [
            'freshGreenProducts' => $freshGreenProducts,
            'freshGreens' => $freshGreens,
            'carts' => $carts,
        ]);
    }

    // for fresh meat
    public function indexMeat(Request $request) {
        $carts = Cart::all();
        $freshMeatProducts = Product::whereIn('product_type_id', [3, 4, 5])->get();
        $freshMeats = ProductType::whereIn('id', [3, 4, 5])->get();
        $meatBrands = Brand::whereIn('id', [1, 2])->get();
        if($request->has('meatType')) {
            $checked = $_GET['meatType'];
            $freshMeatProducts = Product::whereIn('product_type_id', $checked)->get();
            if($request->has('brandType')) {
                $secondChecked = $_GET['brandType'];
                $freshMeatProducts = Product::whereIn('brand_name', $secondChecked)->get();
            }
        } else if($request->has('brandType')) {
            $secondChecked = $_GET['brandType'];
            $freshMeatProducts = Product::whereIn('brand_name', $secondChecked)->get();
        } 
        return view('fresh.showMeat', [
            'freshMeatProducts' => $freshMeatProducts,
            'freshMeats' => $freshMeats,
            'meatBrands' => $meatBrands,
            'carts' => $carts,
        ]);
    }
}
