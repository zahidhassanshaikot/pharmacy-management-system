   
@extends('back-end.master')
@section('title')
Manage Stock
@endsection

@section('activeCustomerList')
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
                
                <li><span>Customer List</span></li>
            </ol>
    
            {{-- <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a> --}}
        </div>
    
        <h2>Customer List</h2>
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
             
                <div class="container-fluid">
                    <div class="panel-body col-md-12 ">
                        <br/>
                    <section class="card">
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>
						
										<h2 class="card-title">Basic</h2>
									</header>
									<div class="card-body">
										<table class="table table-borderedless table-striped mb-0" id="datatable-default">
											<thead>
												<tr>
													<th>Id</th>
													<th>Name</th>
													<th>Phone No</th>
													<th>Email</th>
													<th>Gender</th>
													<th>Address</th>
												</tr>
											</thead>
											<tbody>
											@foreach($obj_customer as $customer)
												<tr>
													<td>{{ $customer->id }}</td>
													<td>{{ $customer->customer_name }}</td>
													<td>{{ $customer->customer_phone }}</td>
													<td >{{ $customer->customer_email }}</td>
													<td >{{ $customer->gender }}</td>
													<td >{{ $customer->address }}</td>
												</tr>
		                                    @endforeach
												
											</tbody>
										</table>
									</div>
								</section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



@endsection