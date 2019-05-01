@extends('back-end.master')
@section('title')
User
@endsection

@section('activeUser')
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
                <li><span>User Info</span></li>
            </ol>
    
            {{-- <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a> --}}
        </div>
    
        <h2>User Info</h2>
    </header>

    @if(Auth::user()->hasRole(['Super Admin', 'Admin']))
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if(Session::get('message'))
                <div class="alert alert-success" id="message">
                    <h3 class=" text-center text-success"> {{ Session::get('message') }}</h3>
                </div>
            @endif
            <div class=" panel panel-default">
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
                    <a><h3 class="center"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Add New User</h3></a>
                </div>

                <div id="IdToggleBtn" style="display: none" class="panel-body ">
                    <br/>
                    <form method="POST" action="{{ route('register-new-user') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                       value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                       value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" title="Must contain at least one number and one uppercase and lowercase letter,spacial character and at least 6 or more characters" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required>
                                <span class="text-danger">{{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : ' ' }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user-type" class="col-md-4 col-form-label text-md-right">User Type</label>

                            <div class="col-md-6">
                                <select class="form-control" name="user_role">

                                    @foreach($roles as $role)
                                        @if($role->name !='Super Admin')
                                            <option value="{{$role->name}}">{{ $role->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" name="btn" class="btn btn-facebook btn-block"/>

                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
   </div>
    @endif


    <br/>
    <br/>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 mb-3">
            <section class="card">
                <div class="card-header">
                    <h3 class="center">Manager</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table table-striped">
                                <tr class="">
                                    <th>SL no</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    {{--<th>Action</th>--}}
                                </tr>
                                @php($i=1)
                                @foreach($userEditors as $userEditor)
                                    <tr class="">
                                        <th>{{$i++}}</th>
                                        <th>{{$userEditor->name}}</th>
                                        <th>{{$userEditor->email}}</th>
                                        {{--<th></th>--}}
                                    </tr>

                                @endforeach
                            </table>
                            <a href="{{ route('all-user-list',['role'=>'Manager']) }}" class="text-uppercase float-right">
                               (View all)</a>

                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-6 mb-3">
            <section class="card">
                <div class="card-header">
                    <h3 class="center">Admin</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table table-striped">
                                <tr class="">
                                    <th>SL no</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    {{--<th>Action</th>--}}
                                </tr>
                                @php($i=1)
                                @foreach($userAdmins as $admin)
                                    <tr class="">
                                        <th>{{$i++}}</th>
                                        <th>{{$admin->name}}</th>
                                        <th>{{$admin->email}}</th>
                                        {{--<th></th>--}}
                                    </tr>

                                @endforeach
                            </table>
                            <a href="{{ route('all-user-list',['role'=>'Admin']) }}" class="text-uppercase float-right">
                                (View all)</a>

                        </div>
                    </div>
                </div>
            </section>
        </div>

<div class="col-lg-6 mb-3">
            <section class="card">
                <div class="card-header">
                    <h3 class="center">Salls Man</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table table-striped">
                                <tr class="">
                                    <th>SL no</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    {{--<th>Action</th>--}}
                                </tr>
                                @php($i=1)
                                @foreach($userSellsMan as $sellsMan)
                                    <tr class="">
                                        <th>{{$i++}}</th>
                                        <th>{{$sellsMan->name}}</th>
                                        <th>{{$sellsMan->email}}</th>
                                        {{--<th></th>--}}
                                    </tr>

                                @endforeach
                            </table>
                            <a href="{{ route('all-user-list',['role'=>'Salls Man']) }}" class="text-uppercase float-right">
                                (View all)</a>

                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</div>

    <br/>
    <br/>
</section>


@endsection