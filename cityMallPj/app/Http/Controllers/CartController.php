<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
        $carts = Cart::all();
        return view('cart.index', [
            'carts' => $carts,
        ]);
    }

    public function store(Request $request, Product $product) {
        if(auth()->user()) {
            Cart::create([
                'user_id' => $request->user()->id,
                'product_id' => $product->id,
                'product_name' => $product->product_name,
                'quantity' => $request->quantity,
                'prize' => $product->prize,
            ]);

            return back();
        } else {
            return redirect('/login');
        };
    }

    public function destroy(Cart $cart) {
        $cart->delete();
        return back();
    }
}
