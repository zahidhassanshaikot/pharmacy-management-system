   
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
                <li><span>update Stock</span></li>
            </ol>
    
            {{-- <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a> --}}
        </div>
    
        <h2>Update Stock</h2>
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
                        <form action="{{ route('update-product') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"> Product Name</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <input type="text" class="form-control" value="{{ $obj_product->product_name }}" name="product_name" required>
                                        <input type="hidden" class="form-control"value="{{ $obj_product->id }}" name="product_id" required>
                                        <span class="text-danger">{{ $errors->has('product_name') ? $errors->first('product_name') : ' ' }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label">Company Name</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <input type="text" class="form-control" value="{{ $obj_product->company }}" name="company" required>
                                        
                                        <span class="text-danger">{{ $errors->has('company') ? $errors->first('company') : ' ' }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label">Group Name</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <input type="text" class="form-control" value="{{ $obj_product->product_group }}" name="product_group" required>
                                       
                                        <span class="text-danger">{{ $errors->has('product_group') ? $errors->first('product_group') : ' ' }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"> Product Price</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <input type="text" class="form-control" value="{{ $obj_product->product_price }}" name="product_price" required>
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
                                        <input type="text" class="form-control"value="{{ $obj_product->product_quantity }}" name="product_quantity" required>
                                        <span class="text-danger">{{ $errors->has('product_quantity') ? $errors->first('product_quantity') : ' ' }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-md-3"> Product Description</label>

                                    <div class="form-group col-md-9">
                                        <textarea class="form-control" name="product_description" >{{ $obj_product->product_description }}</textarea>
                                        <span class="text-danger">{{ $errors->has('product_description') ? $errors->first('product_description') : ' ' }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-md-3"> Product Image</label>

                                    <div class="form-group col-md-9">
                                        <input type="file" class="form-control" title="Image Should be 400*400 px" name="product_image">
                                        <span class="text-danger">{{ $errors->has('product_image') ? $errors->first('product_image') : ' ' }}</span>
                                         @if( $obj_product-> product_image!=null)
                                        <img src="{{ asset($obj_product-> product_image) }}" class="img-thumbnail" alt="image" style="height:80px;wide:80px">
                                        @endif 
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-md-3">publication status</label>

                                    <div class="form-group col-md-9">
                                        <label> <input type="radio" name="publication_status"
                                                       value="1" checked>Published</label>&nbsp;
                                        <label> <input type="radio" name="publication_status"
                                                       value="0">Unpublished</label>
                                        <span class="text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : ' ' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-md-3"></label>
                                    <div class="form-group col-md-9">
                                        <input type="submit" value="update Product Info"
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


   
</section>
@endsection