<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Categories;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;

class ProductsController extends Controller
{
    // home
    public function index() {
        $categories = Categories::all();
        $cart = FacadesCart::content();
        return view('home.index', [
            'categories' => $categories,
            'cart' => $cart,
        ]);
    }

    // show fresh
    public function show() {
        $categories = Categories::all();
        return view('fresh.index', ['categories' => $categories]);
    }

    // for fresh green
    public function indexGreen(Request $request) {
        $cart = FacadesCart::content();
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
            'cart' => $cart,
        ]);
    }

    // for fresh meat
    public function indexMeat(Request $request) {
        $cart = FacadesCart::content();
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
            'cart' => $cart,
        ]);
    }
}
