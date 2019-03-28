   
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
             
                <div class="container">
                    <div class="panel-body col-md-12 ">
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



@endsection