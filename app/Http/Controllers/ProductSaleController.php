<?php

namespace App\Http\Controllers;
use App\Product;
use Cart;
use Illuminate\Http\Request;

class ProductSaleController extends Controller
{
    public function saleProduct($id){
        $obj_product=Product::select('id','product_name')
        ->where('product_quantity','>','0')
        ->where('publication_status','1')
        ->distinct('product_name')->get();
        $cartProducts = Cart::content();
        // return $obj_product;
        return view('back-end.sale.sale-product',[
            'obj_product'=>$obj_product,
            'cartProducts'=>$cartProducts,
            'customer_id'=>$id,
            
        ]);
    }

    public function getProductCost($id){
        $obj_product=Product::find($id);

        echo view('back-end.sale.ajax-product-price', ['obj_product' => $obj_product]);
    }

    public function customerViewPage(){
               $cartProducts = Cart::content();
        return view('back-end.sale.customerView',['cartProducts'=>$cartProducts,]);
    }
}
