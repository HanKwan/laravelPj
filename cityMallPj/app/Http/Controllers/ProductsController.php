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
    public function showFresh() {
        $categories = Categories::all();
        return view('fresh.index', compact('categories'));  // dont need it btw
    }

    // show alcohol
    public function showAlcohol() {
        return view('alcohol.index');
    }

    // show fashion
    public function showFashion(Request $request) {
        $cart = FacadesCart::content();
        $fashionProducts = Product::whereIn('product_type_id', [6, 7])->get();
        $clothTypes = ProductType::whereIn('id', [6, 7])->get();
        $clothBrands = Brand::whereIn('id', [3, 4])->get();
        
        if($request->has('wearType', 'brandType')) {
            $checked = $_GET['wearType'];
            $secondChecked = $_GET['brandType'];
            $fashionProducts = Product::whereIn('product_type_id', $checked)
                ->whereIn('brand_name', $secondChecked)->get();

        }  else if($request->has('wearType')) {
            $checked = $_GET['wearType'];
            $fashionProducts = Product::whereIn('product_type_id', $checked)->get();

        }else if($request->has('brandType')) {
            $secondChecked = $_GET['brandType'];
            $fashionProducts = Product::whereIn('brand_name', $secondChecked)->get();
        }

        return view('fashion.index', compact(
            'cart',
            'fashionProducts',
            'clothTypes',
            'clothBrands',
        ));
    }

    // for fresh green
    public function indexGreen(Request $request) {
        $cart = FacadesCart::content();
        $freshGreenProducts = Product::whereIn('product_type_id', [1, 2])->get();
        $freshGreens = ProductType::whereIn('id', [1, 2])->get();
        // $greenBrands = Brand::all();

        if($request->has('produceType', 'brandType')) {
            $checked = $_GET['produceType'];
            $secondChecked = $_GET['brandType'];
            $freshGreenProducts = Product::whereIn('product_type_id', $checked)
                ->whereIn('brand_name', $secondChecked)->get();
        
        } else if($request->has('produceType')) {
            $checked = $_GET['produceType'];
            $freshGreenProducts = Product::whereIn('product_type_id', $checked)->get();

        } else if($request->has('brandType')) {
            $secondChecked = $_GET['brandType'];
            $freshGreenProducts = Product::whereIn('brand_name', $secondChecked)->get();
        }
        
        return view('fresh.indexGreen', compact(
            'freshGreenProducts',
            'freshGreens', 
            'cart',
        ));
    }

    // for fresh meat
    public function indexMeat(Request $request) {
        $cart = FacadesCart::content();
        $freshMeatProducts = Product::whereIn('product_type_id', [3, 4, 5])->get();
        $freshMeats = ProductType::whereIn('id', [3, 4, 5])->get();
        $meatBrands = Brand::whereIn('id', [1, 2])->get();

        if($request->has('meatType', 'brandType')) {
            $checked = $_GET['meatType'];
            $secondChecked = $_GET['brandType'];
            $freshMeatProducts = Product::whereIn('product_type_id', $checked)
                ->whereIn('brand_name', $secondChecked)->get();
        
        } else if($request->has('meatType')) {
            $checked = $_GET['meatType'];
            $freshMeatProducts = Product::whereIn('product_type_id', $checked)->get();
            
        } else if($request->has('brandType')) {
            $secondChecked = $_GET['brandType'];
            $freshMeatProducts = Product::whereIn('brand_name', $secondChecked)->get();
        }

        return view('fresh.indexMeat', compact(
            'freshMeatProducts',
            'freshMeats',
            'meatBrands',
            'cart',
        ));
    }
}
