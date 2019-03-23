   
@extends('back-end.master')
@section('title')
Manage Stock
@endsection
@section('appUser')
active
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
                <li><span>Manage Stock</span></li>
            </ol>
    
            {{-- <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a> --}}
        </div>
    
        <h2>Manage Stock</h2>
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
                <div onclick="btnToggleFunction()" class="panel-header btn btn-default btn-block">
                    <a><h3 class="center"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp Add New Product</h3></a>
                </div>
                <div class="container">
                    <div id="IdToggleBtn" style="" class="panel-body col-md-12 ">
                        <br/>
                        <form action="{{ route('add-product') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"> Product Name</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <input type="text" class="form-control" name="product_name" required>
                                        <span class="text-danger">{{ $errors->has('product_name') ? $errors->first('product_name') : ' ' }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"> Product Price</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <input type="text" class="form-control" name="product_price" required>
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
                                    <label class="control-label col-md-3"> Product Description</label>

                                    <div class="form-group col-md-9">
                                        <textarea class="form-control" name="product_description" ></textarea>
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
                                        <input type="submit" value="Save Product Info"
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
                    <h3 class="center">Categories</h3>
                </div>
                <div class="card-body">

                    <table class="table table-striped">
                        <tr class="text-primary">
                            <th>SL no</th>
                            <th>Category Name</th>
                            <th>Category description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        {{--  @php($i = $categories->perPage() * ($categories->currentPage() - 1))
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $category-> category_name}}</td>
                                <td>{{ $category-> category_description}}</td>
                                <td>{{ $category-> publication_status==1 ? 'Published':'Unpublished'}}</td>

                                <td>
                                    @if($category-> publication_status==1)
                                        <a href="{{ route('unpublished-category',['id'=>$category->id]) }}" data-toggle="tooltip" data-placement="bottom"
                                           class="btn btn-info btn-xs" title="Unpublished">
                                            <span class="fa fa-arrow-up"></span>
                                        </a>
                                    @else
                                        <a href="{{ route('published-category',['id'=>$category->id]) }}" data-toggle="tooltip" data-placement="bottom"
                                           class="btn btn-warning btn-xs"title="Published">
                                            <span class="fa fa-arrow-down"></span>
                                        </a>
                                    @endif
                                    <a href="{{ url('admin/category/edit/'.$category->id) }}" data-toggle="tooltip" data-placement="bottom"
                                       class="btn btn-success btn-xs" title="Edit">
                                        <span class="fa fa-edit"></span>
                                    </a>  --}}
                                    {{--<a href="{{ route('delete-category',['id'=>$category->id]) }}"--}}
                                       {{--class="btn btn-danger btn-xs" title="Delete">--}}
                                        {{--<span class="fa fa-trash"></span>--}}
                                    {{--</a>--}}
                                {{--  </td>
                            </tr>
                        @endforeach  --}}
                    </table>
                    {{--  <div class="float-right">
                        {{ $categories->links() }}
                    </div>  --}}
                </div>

            </div>
        </div>
    </div>
    </div>

   
</section>
@endsection