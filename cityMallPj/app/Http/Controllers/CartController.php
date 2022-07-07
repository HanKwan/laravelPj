<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
        $carts = FacadesCart::content();
        $totalAmount = FacadesCart::total();
        $tax = FacadesCart::tax();
        $totalPrice = FacadesCart::subtotal();

        return view('cart.index', compact('carts', 'tax', 'totalPrice', 'totalAmount'));
    }

    public function store(Request $request, Product $product) {
        if(auth()->user()) {
            FacadesCart::add($product->id, $product->product_name, $request->quantity, $product->price, 0, [        //id, name, quantity, prize, weight, optionals
                'user_id' => $request->user()->id,
                'quantity' => $request->quantity,
                'product_img' => $product->product_img,
            ]);

            return back()->with('message', 'Added to cart successfully!');

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

    public function purchase() {
        if(FacadesCart::content()->count()) {
            FacadesCart::destroy();
        } else {
            return back()->with('message', 'Add something to cart to purchase.');
        }

        return back()->with('message', 'Thank you for purchasing from CityMall :)');
    }
}
