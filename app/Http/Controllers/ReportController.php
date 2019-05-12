<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Product;
use App\ProductSale;
use Illuminate\Support\Facades\Session;
use File;
use Image;

class ReportController extends Controller
{
    public function mostSaleProduct(){
        $obj_product=ProductSale::join('products', 'product_sales.product_id', '=', 'products.id')
        ->select('products.product_image','products.product_name','products.company_name','products.group_name',
        DB::raw("sum(product_sales.product_quantity) as total_sale"))
        ->groupBy('products.product_image','products.product_name','products.company_name','products.group_name')
        ->get();
        // return $obj_product;
        return view('back-end.report.most-sale-product',['obj_product'=>$obj_product]);
    }
    public function fullCourseNotTaken(){
        $customers=ProductSale::join('customers', 'product_sales.customer_id', '=', 'customers.id')
        ->whereRaw('product_need-product_quantity > 0')
        ->select('customers.id','customers.customer_name','customers.customer_phone','customers.customer_email')
        ->groupBy('customers.id','customers.customer_name','customers.customer_phone','customers.customer_email')
        ->get();

        // return $customers;
        return view('back-end.report.did_not_take_full_course',['customers'=>$customers]);
    }
    public function detailsFullCourseNotTaken($id){
    
        $obj_product=ProductSale::join('customers', 'product_sales.customer_id', '=', 'customers.id')
        ->join('products', 'product_sales.product_id', '=', 'products.id')
        ->whereRaw('product_sales.product_need-product_sales.product_quantity > 0')
        ->where('product_sales.customer_id',$id)
        ->select('products.product_image','products.product_name','products.company_name','products.group_name',
        'product_sales.product_need','product_sales.product_quantity')
        ->groupBy('products.product_image','products.product_name','products.company_name','products.group_name',
        'product_sales.product_need','product_sales.product_quantity')
        ->get();

        //  return $obj_product;
        return view('back-end.report.details-full-course-not-taken',['obj_product'=>$obj_product]);
    }
}
