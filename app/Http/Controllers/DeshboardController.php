<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Product;
use App\ProductSale;
use Carbon\Carbon;


class DeshboardController extends Controller
{
    public function index(){
        $obj_customer=Customer::OrderBy('created_at','DESC')->take(3)->get();
        $total_customer=Customer::count();
        $todays_customer=Customer::whereDate('created_at', Carbon::today())->count();
        $obj_sale=ProductSale::all();
        $obj_todays_sale=ProductSale::whereDate('created_at', Carbon::today())->get();
        $total_sale=0;
        $todays_sale=0;
        foreach($obj_sale as $sale){
            $total_sale=$total_sale+($sale->product_price*$sale->product_quantity)- $sale->product_discount;

        }
        foreach($obj_todays_sale as $sale){
            $todays_sale=$todays_sale+($sale->product_price*$sale->product_quantity)- $sale->product_discount;

        }
        // return $total_sale;
        

        return view('back-end.deshboard.deshboard',[
            'total_customer'=>$total_customer,
            'obj_customer'=>$obj_customer,
            'todays_customer'=>$todays_customer,
            'total_sale'=>$total_sale,
            'todays_sale'=>$todays_sale,
        ]);
    }
}
