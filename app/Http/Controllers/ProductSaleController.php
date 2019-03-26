<?php

namespace App\Http\Controllers;
use App\Product;
use Cart;
use Illuminate\Http\Request;

class ProductSaleController extends Controller
{
    public function saleProduct(){
        $obj_product=Product::select('id','product_name')->distinct('product_name')->get();
        $cartProducts = Cart::content();
        // return $obj_product;
        return view('back-end.sale.sale-product',[
            'obj_product'=>$obj_product,
            'cartProducts'=>$cartProducts,
        ]);
    }

    public function getProductCost($id){
        $obj_product=Product::find($id);

        echo view('back-end.sale.ajax-product-price', ['obj_product' => $obj_product]);
    }

}
