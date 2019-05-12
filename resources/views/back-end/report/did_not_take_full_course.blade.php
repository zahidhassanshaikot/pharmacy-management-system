   
@extends('back-end.master')
@section('title')
Manage Stock
@endsection

@section('activeReport')
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
                <li><span>Product Report</span></li>
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
                    <h3 class="center">Customers</h3>
                </div>
                <div class="card-body">

                    <table class="table table-borderedless table-striped mb-0" id="datatable-default">
                        <thead>
                        <tr class="text-primary">
                            <th>SL no</th>
                             
                            <th>Customer Name</th>
                            <th>Customer Phone No</th>
                            <th>Customer Email</th> 
                           
                           
                        </tr>
                        </thead>
                        <tbody>
                          @php($i = 0)
                       @foreach($customers as $customer)
                            <tr>
                                <td>{{ ++$i }}</td>
                                      
                                <td> <a href="{{ route('details-full-course',['id'=>$customer->id]) }}" class="btn-link "> {{ $customer-> customer_name}} </a></td>
                                <td>{{ $customer-> customer_phone}}</td>
                                <td>{{ $customer-> customer_email}}</td>
                                                    
  
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