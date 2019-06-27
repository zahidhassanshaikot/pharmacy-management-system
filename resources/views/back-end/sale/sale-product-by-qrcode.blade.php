   
@extends('back-end.master')
@section('title')
Manage Stock
@endsection

@section('activeSaleProduct')
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
                <li><span>Sell Product</span></li>
            </ol>
    
            {{-- <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a> --}}
        </div>
    
        <h2>Sell Product</h2>
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
            
            @if(Session::get('er_message'))
                <div class="alert alert-danger" >
                    <h3 class=" text-center text-danger">{{ Session::get('er_message') }} is not Available</h3>
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
                            <th>Product need</th>
                            <th> total </th>
                            <th>Action</th>
                        </tr>
                        @php($i = 0)
                        @php($sum = 0)
                        @foreach($cartProducts as $cartProduct)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td> {{ $cartProduct->product_name}}</td>
                                <td>{{ $cartProduct->product_price}}</td>
                                <td>{{ $cartProduct->product_quantity}}</td>
                                <td>{{ $cartProduct->product_need}}</td>
                                <td>
                                    @php($sum+=$cartProduct->product_quantity* $cartProduct->product_price) 
                                     
                                    {{ $cartProduct->product_quantity* $cartProduct->product_price }}
                                </td>
                                <td>
                     
                          
                        <a href="#" data-toggle="modal" data-target="#productInfo-{{ $cartProduct->id }}"
                             class="btn btn-success btn-xs">
                         <span class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></span>
                        </a>
                                    <a href="{{ route('delete-qrcode-item', ['rowId'=>$cartProduct->id]) }}"data-toggle="tooltip" data-placement="top"
                                       class="btn btn-danger btn-xs" title="Delete">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                 </td>
                            </tr>
    <div class="modal fade" id="productInfo-{{ $cartProduct->id }}" role="dialog" tabIndex="-1">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Add Quantity and Product Need</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update-product-from-app') }}" method="post"
                    role="form"
                    class="contactForm">
                    {{ csrf_field() }}
                    <div class="row">
                            <div class=" col-md-3 form-group">
                                <label>Product Quantity</label>
                                <input type="hidden" value="{{$cartProduct->id }}" name="id">
                            </div>
                            <div class=" col-md-8 form-group">
                                <input type="number" class="form-control" name="product_quantity">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-3 form-group">
                                <label>Product Need</label>
                            </div>
                            <div class=" col-md-8 form-group">
                                <input type="number" class="form-control" name="product_need">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-3 form-group">

                            </div>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-info float-right" value="Submit"
                                name="btn">
                            </div>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close
                </button>
            </div>
        </div>

    </div>
                        @endforeach 
                    </table>
      
                 <div class="pull-right">
                        <a href="{{ route('remove-all-app-product') }}"data-toggle="tooltip" data-placement="top"
                             class="btn btn-danger btn-xs" title="Delete">
                                <span class="fa fa-trash"></span> Remove All
                        </a>
                                   
                        <a href="#" data-toggle="modal" data-target="#vatAndDiscount"
                             class="btn btn-facebook btn-xs">
                         <span class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Invoice"></span> Invoice
                        </a>

                        <a href="{{ route('checkout-app-product',['id'=>$customer_id]) }}"data-toggle="tooltip" data-placement="top"
                             class="btn btn-info btn-xs" title="Checkout">
                         <span class="fa fa-trash"></span> Checkout
                        </a>
                 </div>
                </div>

            </div>
        </div>
    </div>
    </div>





    
    <div class="modal fade" id="vatAndDiscount" role="dialog" tabIndex="-1">
        <div class="modal-dialog">

            <!-- Modal content-->
           <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title text-center">Add VAT And Discount</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('invoice-app-product') }}" method="post"
                        role="form"
                        class="contactForm">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class=" col-md-3 form-group">
                                <label>VAT</label>
                                <input type="hidden" value="{{$customer_id}}" name="id">
                            </div>
                            <div class=" col-md-8 form-group">
                                <input type="number" class="form-control" name="vat">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-3 form-group">
                                <label>Discount</label>
                            </div>
                            <div class=" col-md-8 form-group">
                                <input type="number" class="form-control" name="discount">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-3 form-group">

                            </div>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-info float-right" value="Submit"
                                name="btn">
                            </div>
                        </div>
                    </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close
                </button>
            </div>
        </div>

    </div>







<script>

   {{-- setTimeout(function(){
       location.reload();
   },3000); --}}

    {{-- setInterval(function(){
   $('#my_div').load('/');
}, 2000) /* time in milliseconds (ie 2 seconds)*/ --}}


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