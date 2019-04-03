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
}
