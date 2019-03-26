<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request){

       $product = Product::find($request->product_id);
    //    return $product;

        Cart::add([
            'id' => $request->product_id,
            'name' => $product->product_name,
            'price' =>$request->product_price,
            'qty'   => $request->product_quantity,
            'options' => [
                'image' => $product->product_image
            ]
        ]);

        return redirect()->back()->with('message','product Added successfully');

    }
    public function removeFromCart($id){
        Cart::remove($id);
        return redirect()->back()->with('message','Cart item removed');
    }

}
