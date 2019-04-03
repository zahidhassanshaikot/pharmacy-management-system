<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Product;

class CustomerController extends Controller
{
    public function customerAdd(){
        $obj_customers=Customer::orderBy('created_at','DESC')->get();
        return view('back-end.customer.add-customer',['obj_customers'=>$obj_customers]);
    }
    public function saveCostomerInfo(Request $request){
        
          $this->validate($request, [
            'customer_name' => 'required|regex:/^[\pL\s\-]+$/u|max:20|min:2',
            'customer_email' => 'required'
        ]);
        $obj_customer = new Customer();


        $obj_customer->customer_name = $request->customer_name;
        $obj_customer->customer_phone = $request->customer_phone;
        $obj_customer->customer_email = $request->customer_email;
        $obj_customer->gender = $request->gender;
        $obj_customer->date_of_birth = $request->date_of_birth;
        $obj_customer->address = $request->address;
        $obj_customer->save();
        // $obj_customer->id;
        return redirect()->route('sale-product',['id'=> $obj_customer->id]);
        return $request;
    }
    public function customerList(){
        $obj_customer=Customer::OrderBy('created_at','DESC')->get();
        return view('back-end.customer.customer-list')->with(compact('obj_customer'));
    }
}
