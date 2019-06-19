<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Illuminate\Http\Request;
use App\Customer;
use App\ProductSale;
use PDF;

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
                'image' => $product->product_image,
                'company_name' => $product->company_name,
                'group_name' => $product->group_name,
                'product_need' => $request->product_need
            ]
        ]);
        // $cartProducts=Cart::content();
        // return $cartProducts;

        return redirect()->back()->with('message','product Added successfully');

    }
    public function removeFromCart($id){
        Cart::remove($id);
        return redirect()->back()->with('message','Cart item removed');
    }
    public function removeAllFromCart(){
       Cart::destroy();
        return redirect()->back()->with('message','All cart item removed');
    }
    public function checkout($customer_id){
        
        $cartProducts=Cart::content();
        // return $cartProducts;
       
        foreach($cartProducts as $cartProduct){
            $product = Product::find($cartProduct->id);
            if($cartProduct->qty > $product->product_quantity){
            
            return redirect()->back()->with('er_message',$product->product_name);
            
            } 

        }
        foreach($cartProducts as $cartProduct){
            $product = Product::find($cartProduct->id);
            if($cartProduct->qty <= $product->product_quantity){
            $product->product_quantity=$product->product_quantity-$cartProduct->qty;
            $product->save();

            $obj_sale_product=new ProductSale();
            $obj_sale_product->customer_id=(int)$customer_id;
            $obj_sale_product->product_id=(int)$cartProduct->id;
            $obj_sale_product->product_price=$cartProduct->price;
            $obj_sale_product->product_quantity=$cartProduct->qty;

            $obj_sale_product->product_need=$cartProduct->options->product_need;

            $obj_sale_product->product_discount=0;
            //  return gettype($obj_sale_product->product_id);
            $obj_sale_product->save();
            
            
            
            } 

        }
        Cart::destroy();
        return redirect()->route('add-customer')->with('message','Product Successfully Checkout.');

    }
    public function invoice(Request $request){
        $customer_id=$request->id;
        // return $request;
        $cartProducts=Cart::content();
        $customer=Customer::find($customer_id);
        //  return $customer;
       
        foreach($cartProducts as $cartProduct){
            $product = Product::find($cartProduct->id);
            if($cartProduct->qty > $product->product_quantity){
            
            return redirect()->back()->with('er_message',$product->product_name);
            
            } 
        }
        $total=0;
        foreach($cartProducts as $cartProduct){
            $total=$total+$cartProduct->subtotal;

        }
        $calculation= $total-($total*$request->vat/100)-($total*$request->discount/100);
        // return $calculation;

 $pdf = PDF::loadView('back-end.pdf.invoice', [
        'cartProducts'=>$cartProducts,
        'customer'=>$customer,
        'total'=>$total,
        'vat'=>$request->vat,
        'discount'=>$request->discount,
        'calculation'=>$calculation,

    ]);
// return $pdf->download('payslip.pdf');
return $pdf->stream();


    }

}
