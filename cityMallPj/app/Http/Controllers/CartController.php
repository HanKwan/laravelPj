<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
        $carts = FacadesCart::content();
        // dd($carts);
        return view('cart.index', [
            'carts' => $carts,
        ]);
    }

    public function store(Request $request, Product $product) {
        if(auth()->user()) {
            FacadesCart::add($product->id, $product->product_name, $request->quantity, $product->price, 0, [        //id, name, quantity, prize, weight, optionals
                'user_id' => $request->user()->id,
                'quantity' => $request->quantity,
                'product_img' => $product->product_img,
            ]);

            return back();

        } else {
            return redirect('/login');
        };
    }

    public function update(Request $request, $id) {
        if(auth()->user()) {
            FacadesCart::update($id, $request->quantity);
            return back();
        }
    }

    public function destroy($id) {
        FacadesCart::remove($id);   //just need rowId only
        return back();
    }
}
