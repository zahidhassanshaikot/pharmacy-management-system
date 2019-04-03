   
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
                <li><span>Customer Info</span></li>
            </ol>
    
            {{-- <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a> --}}
        </div>
    
        <h2>Customer Info</h2>
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
               <div onclick="btnToggleFunction()" class="panel-header btn btn-default btn-block" style="padding: 0px 6px;font-size: 12px;">
                    <a><h4 class="center"><i class="fa fa-plus" aria-hidden="true" ></i> &nbsp New Customer</h4></a>
                </div>
                <div class="container-fluid">
              
                    <div id="IdToggleBtn" style="display:none" class="panel-body col-md-12 ">
                        <br/>
                        <form action="{{ route('add-customer-info') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"> Customer Name</label>
                                    </div>

                                    <div class="form-group col-md-9" >
                                        <input type="text" class="form-control"  name="customer_name" required>
                                        <span class="text-danger">{{ $errors->has('customer_name') ? $errors->first('customer_name') : ' ' }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"> Customer Phone</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <input type="text" class="form-control" name="customer_phone" >
                                        <span class="text-danger">{{ $errors->has('customer_phone') ? $errors->first('customer_phone') : ' ' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"> customer_email</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <input type="email" class="form-control" name="customer_email">
                                        <span class="text-danger">{{ $errors->has('customer_email') ? $errors->first('customer_email') : ' ' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label">Gender</label>
                                    </div> 
                                    <div class="form-group col-md-9">
                                        <select class="form-control" name="gender" >
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label">Date Of Birth</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <input type="date" class="form-control" name="date_of_birth">
                                        <span class="text-danger">{{ $errors->has('date_of_birth') ? $errors->first('date_of_birth') : ' ' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label">Address</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <input type="text" class="form-control" name="address">
                                        <span class="text-danger">{{ $errors->has('address') ? $errors->first('address') : ' ' }}</span>
                                    </div>
                                </div>
                            </div>
          
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-md-3"></label>
                                    <div class="form-group col-md-9">
                                        <input type="submit" value="Next"
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
                    <h3 class="center">Customer</h3>
                </div>
                <div class="card-body">

                    <table class="table table-borderedless table-striped mb-0" id="datatable-default">
                        <thead>
                        <tr class="text-primary">
                            <th>#</th>
                            <th>Customer ID</th>
                            <th>Customer Name</th>
                            <th>Phone No</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Address</th> 
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                       
                       @foreach($obj_customers as $customer)
                            <tr>
                                <td></td>
                                <td>{{ $customer->id }}</td>
                                <td>{{ $customer->customer_name }}</td>
                                <td>{{ $customer->customer_phone }}</td>
                                <td>{{ $customer->customer_email }}</td>
                                <td>{{ $customer->gender }}</td>
                                <td>{{ $customer->address }}</td>
                           
                                <td>
                                
                                    <a href="{{ route('sale-product',['id'=>$customer->id]) }}"data-toggle="tooltip" data-placement="top"
                                       class="btn btn-outline-info btn-xs" title="Sale">
                                       <span class="fas fa-cart-arrow-down"> </span>
                                    </a>
                                 </td>
                            </tr>
                        @endforeach 
                        </tbody>
                    </table>
                 
                </div>

            </div>
        </div>
    </div>
    </div>


@endsection