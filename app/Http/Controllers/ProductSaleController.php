<?php

namespace App\Http\Controllers;
use App\Product;
use Cart;
use App\Customer;
use App\ProductSale;
use PDF;
use App\ProductFromApp;
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
    public function sellByQrcode($id){
        $cartProducts = ProductFromApp::all();
        // return $obj_product;
        return view('back-end.sale.sale-product-by-qrcode',[
      
            'cartProducts'=>$cartProducts,
            'customer_id'=>$id,
            
        ]);
    }
    public function deleteQrcodeItem($id){
        ProductFromApp::where('id',$id)->delete();
        return redirect()->back();
    }
    public function updateProductFromApp(Request $request){
        
        $p_id=$request->id;
        $product=ProductFromApp::find($p_id);
        $product->product_quantity = $request->product_quantity;
        $product->product_need = $request->product_need;
         $product->save();
        return redirect()->back();
    }
    public function removeAllAppProduct(){

        $cartProducts=ProductFromApp::all();
        foreach($cartProducts as $cartProduct){
        ProductFromApp::where('id',$cartProduct->id)->delete();
        }
        return redirect()->back();
    }
    public function invoiceAppProduct(Request $request){
$customer_id=$request->id;
        // return $request;
        $cartProducts=ProductFromApp::all();
        $customer=Customer::find($customer_id);
        //  return $customer;
        
       
        foreach($cartProducts as $cartProduct){
            $product = Product::find($cartProduct->product_id);
            if($cartProduct->product_quantity!=null){
            if($cartProduct->product_quantity > $product->product_quantity){
            
            return redirect()->back()->with('er_message',$product->product_name);
            
            }
        }else {
            return redirect()->back()->with('message','error');
        }
 
        }
        $total=0;
        foreach($cartProducts as $cartProduct){
            $total=$total+$cartProduct->product_quantity*$cartProduct->product_price;

        }
        $calculation= $total+($total*$request->vat/100)-($total*$request->discount/100);
        // return $calculation;

 $pdf = PDF::loadView('back-end.pdf.invoice2', [
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


    public function checkoutAppProduct($customer_id){
         $cartProducts=ProductFromApp::all();
        // return $cartProducts;
       
        foreach($cartProducts as $cartProduct){
            $product = Product::find($cartProduct->product_id);
            
            if($cartProduct->product_quantity > $product->product_quantity){
            
            return redirect()->back()->with('er_message',$product->product_name);
            
            } 

        }
        foreach($cartProducts as $cartProduct){
            $product = Product::find($cartProduct->product_id);
            if($cartProduct->product_quantity <= $product->product_quantity){
            $product->product_quantity=$product->product_quantity-$cartProduct->product_quantity;
            $product->save();

            $obj_sale_product=new ProductSale();
            $obj_sale_product->customer_id=(int)$customer_id;
            $obj_sale_product->product_id=(int)$cartProduct->product_id;
            $obj_sale_product->product_price=$cartProduct->product_price;
            $obj_sale_product->product_quantity=$cartProduct->product_quantity;

            $obj_sale_product->product_need=$cartProduct->product_need;

            $obj_sale_product->product_discount=0;
            //  return gettype($obj_sale_product->product_id);
            $obj_sale_product->save();
            
            
            
            } 

        }
        foreach($cartProducts as $cartProduct){
        ProductFromApp::where('id',$cartProduct->id)->delete();
        }
        return redirect()->route('add-customer')->with('message','Product Successfully Checkout.');

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
