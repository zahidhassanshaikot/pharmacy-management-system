   
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
            <div class=" card panel-default">
                <div class="card-header">
                    <h3 class="center">Products</h3>
                </div>
                <div class="card-body">

                    <table class="table table-borderedless table-striped mb-0" id="datatable-default">
                        <thead>
                        <tr class="text-primary">
                            <th>SL no</th>
                             {{--  <th>Product Image</th>   --}}
                            <th>Product Name</th>
                            <th>Company Name</th>
                            <th>Group Name</th> 
                            <th>Total Sale</th> 
                           
                        </tr>
                        </thead>
                        <tbody>
                          @php($i = 0)
                       @foreach($obj_product as $product)
                            <tr>
                                <td>{{ ++$i }}</td>
                                       {{--  <td>
                                    @if( $product-> product_image!=null)
                                    <img src="{{ asset($product-> product_image) }}" class="rounded-circle" alt="image" style="height:50px;wide:50px">
                                    @else 
                                    <img src="{{ asset('images/medicine.png') }}" class="rounded-circle" alt="image" style="height:50px;wide:50px">
                                    @endif
                                </td>  --}}
                                <td>{{ $product-> product_name}}</td>
                                <td>{{ $product-> company_name}}</td>
                                <td>{{ $product-> group_name}}</td>
                                <td>{{ $product-> total_sale}}</td>                      
  
                            </tr>
                        @endforeach 
                        </tbody>
                    </table>
                  
                </div>

            </div>
        </div>
    </div>
    </div>

   
</section>
@endsection