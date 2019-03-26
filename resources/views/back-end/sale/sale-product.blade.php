   
@extends('back-end.master')
@section('title')
Manage Stock
@endsection

@section('activeStock')
nav-expanded nav-active
@endsection
@section('content')

<section role="main" class="content-body">
    <header class="page-header page-header-left-breadcrumb">
        <div class="right-wrapper">
            <ol class="breadcrumbs">
                <li>
                    <a href="{{ route('/') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Layouts</span></li>
                <li><span>Sale Product</span></li>
            </ol>
    
            {{-- <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a> --}}
        </div>
    
        <h2>Sale Product</h2>
    </header>

    <!-- start: page -->

    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            @if(Session::get('message'))
                <div class="alert alert-success" id="message">
                    <h3 class=" text-center text-success"> {{ Session::get('message') }}</h3>
                </div>
            @endif
            <div class=" card card-default">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
             
                <div class="container">
                    <div class="panel-body col-md-12 ">
                        <br/>
                        <form action="{{ route('add-to-cart') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"> Product Name</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <select class="form-control" name="product_id" onchange="productPrice(this.value)">
                                            <option value="">Select Product</option>
                                            @foreach($obj_product as $product)
                                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                            @endforeach
                                        </select>
         
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"> Product Price</label>
                                    </div>

                                    <div class="form-group col-md-9" id="product_price">
                                        <input type="text" class="form-control"  name="product_price" required>
                                        <span class="text-danger">{{ $errors->has('product_price') ? $errors->first('product_price') : ' ' }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"> Product Quantity</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <input type="text" class="form-control" name="product_quantity" required>
                                        <span class="text-danger">{{ $errors->has('product_quantity') ? $errors->first('product_quantity') : ' ' }}</span>
                                    </div>
                                </div>
                            </div>
          
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-md-3"></label>
                                    <div class="form-group col-md-9">
                                        <input type="submit" value="Add"
                                               class="btn btn-success btn-block" name="btn">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>






 <br/>
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class=" card panel-default">
                <div class="card-header">
                    <h3 class="center">Products</h3>
                </div>
                <div class="card-body">

                    <table class="table table-striped">
                        <tr class="text-primary">
                            <th>SL no</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            
                            <th>Product Image</th>
                            
                            <th>Action</th>
                        </tr>
                        @php($i = 1)
                        @php($sum = 0)
                        @foreach($cartProducts as $cartProduct)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $cartProduct-> name}}</td>
                                <td>{{ $cartProduct-> price}}</td>
                                <td>{{ $cartProduct-> qty}}</td>

                                <td>
                                    @if( $cartProduct->options-> image!=null)
                                    <img src="{{ asset($cartProduct->options-> image) }}" class="rounded-circle" alt="image" style="height:50px;wide:50px">
                                    @else 
                                    <img src="{{ asset('images/medicine.png') }}" class="rounded-circle" alt="image" style="height:50px;wide:50px">
                                    @endif
                                    </td>

                                <td>
                     
                                    {{-- <a href="{{ url('admin/product/edit/'.$cartProduct->id) }}" data-toggle="tooltip" data-placement="top"
                                       class="btn btn-success btn-xs" title="Edit">
                                        <span class="fa fa-edit"></span>
                                    </a>  --}}
                                    <a href="{{ route('delete-cart-item', ['rowId'=>$cartProduct->rowId]) }}"data-toggle="tooltip" data-placement="top"
                                       class="btn btn-danger btn-xs" title="Delete">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                 </td>
                            </tr>
                        @endforeach 
                    </table>
                 
                </div>

            </div>
        </div>
    </div>
    </div>





<script>
    function productPrice(id) {

        
       
        var xmlHttp = new XMLHttpRequest();
        var serverPage = 'http://127.0.0.1:8000/get-product-cost/'+id;
 //console.log(serverPage);
        xmlHttp.open('GET', serverPage);
        xmlHttp.onreadystatechange = function () {
             //console.log(xmlHttp.status == 200);
            if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                 //alert("Hello! I am an alert box!!");
                // console.log(xmlHttp.status == 200);
                document.getElementById('product_price').innerHTML = xmlHttp.responseText;
            }
        }
        xmlHttp.send(null);
    }
</script>
   
</section>
@endsection