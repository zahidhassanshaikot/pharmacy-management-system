<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Product;
use Illuminate\Support\Facades\Session;
use File;
use Image;


class ManageStockController extends Controller
{
    public function manageStock(){
        $obj_product=Product::paginate(7);

        return view('back-end.manage-stock.manage-stock',['obj_product'=>$obj_product]);
}
    public function addProduct(Request $request){

          $this->validate($request, [
            'product_name' => 'required|regex:/^[\pL\s\-]+$/u|max:20|min:2',
            'publication_status' => 'required'
        ]);
        $obj_product = new Product();


        $obj_product->product_name = $request->product_name;
        $obj_product->product_price = $request->product_price;
        $obj_product->product_quantity = $request->product_quantity;
        $obj_product->product_description = $request->product_description;
        $obj_product->publication_status = $request->publication_status;

        if ($request->file('product_image')) {
            $this->validate($request, [
                'product_image' => 'required|mimes:jpg,JPG,JPEG,jpeg,png|max:2048',
            ]);
            $categoryImage = $request->file('product_image');
            $fileType = $categoryImage->getClientOriginalExtension();
            $imageName = date('YmdHis') . "PMS" . rand(5, 10) . '.' . $fileType;
            $directory = 'images/';
            $imageUrl = $directory . $imageName;
            Image::make($categoryImage)->save($imageUrl);
            $obj_product->product_image = $imageUrl;
        }

        //    return $obj_product;
        $obj_product->save();

        return redirect()->back()->with('message','Product Info Save successfully');

    }

    public function unpublishedProduct($id){
            $obj_product=Product::find($id);
            $obj_product->publication_status = 0;
            $obj_product->save();
            return redirect()->back()->with('message','Product Info successfully unpublished');

    }
    public function publishedProduct($id){
            $obj_product=Product::find($id);
            $obj_product->publication_status = 1;
            $obj_product->save();
            return redirect()->back()->with('message','Product Info Save successfully published');

    }
    public function deleteProduct($id){
            $obj_product=Product::find($id);
            //    if (File::exists($obj_product->product_image)) {
            //     unlink($obj_product->product_image);
            // }
            $obj_product->delete();
    
            return redirect()->back()->with('message','Product Info Save successfully deleted');

    }
    public function editProduct($id){
        $obj_product=Product::find($id);
        return view('back-end.manage-stock.edit-product',[
            'obj_product'=>$obj_product
        ]);
    }

    public function updateProduct(Request $request){
        
          $this->validate($request, [
            'product_name' => 'required|regex:/^[\pL\s\-]+$/u|max:20|min:2',
            'publication_status' => 'required'
        ]);
        $obj_product =Product::find($request->product_id);


        $obj_product->product_name = $request->product_name;
        $obj_product->product_price = $request->product_price;
        $obj_product->product_quantity = $request->product_quantity;
        $obj_product->product_description = $request->product_description;
        $obj_product->publication_status = $request->publication_status;

        if ($request->file('product_image')) {
            $this->validate($request, [
                'product_image' => 'required|mimes:jpg,JPG,JPEG,jpeg,png|max:2048',
            ]);

            if (File::exists($obj_product->product_image)) {
                unlink($obj_product->product_image);
            }
            $categoryImage = $request->file('product_image');
            $fileType = $categoryImage->getClientOriginalExtension();
            $imageName = date('YmdHis') . "PMS" . rand(5, 10) . '.' . $fileType;
            $directory = 'images/';
            $imageUrl = $directory . $imageName;
            Image::make($categoryImage)->save($imageUrl);
            $obj_product->product_image = $imageUrl;
        }

        $obj_product->save();

        return redirect()->route('manage-stock')->with('message','Product Info update successfully');
    }
}