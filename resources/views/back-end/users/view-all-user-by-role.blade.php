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
                    <a><h3 class="center"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp Add New User</h3></a>
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
                                name="password"
                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters"
                                required>

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
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <section class="card">
                <div class="card-header">
                    {{--                        <h3 class="center">{{$role->name}}</h3>--}}
                    <h3 class="center">{{$roleRequested}}</h3>
                </div>
                <div class="card-body">

                    {{--<div class="col-md-12">--}}
                        <table class="table table-striped" width="100%">
                            <tr class="">
                                <th scope="col">SL no</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                @role('Super Admin')
                                <th scope="col">Action</th>
                                @endrole
                            </tr>
                            @php($i = $userList->perPage() * ($userList->currentPage() - 1))
                            @foreach($userList as $user)
                            <tr class="">
                                <td data-title="SL no">{{++$i}}</td>
                                <td data-title="Name">{{$user->name}}</td>
                                <td data-title="Email">{{$user->email}}</td>
                                @role('Super Admin')
                                <td data-title="Action">

                                    <div class="row ">

                                        <div class="col-md-3">
                                            <span data-toggle="modal" data-target="#changeRole-{{$user->id}}">
                                                <a data-toggle="tooltip" href="#" title="Change User Role"
                                                data-placement="top"
                                                class="btn btn-warning btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </span>
                                    </div>
                                    <div class="col-md-3">
                                      <span data-toggle="modal" data-target="#changePassword-{{$user->id}}">
                                        <a data-toggle="tooltip" href="#" title="Change User Password"
                                        data-placement="top"
                                        class="btn btn-info btn-xs">
                                        <i class="fas fa-unlock-alt"></i>
                                        {{--<i class="fas fa-key"></i>--}}
                                        {{--<i class="fa fa-user-edit"></i>--}}
                                    </a>
                                </span>
                            </div>
                            <div class="col-md-3">
                                {{-- <a href="#"  class="btn btn-danger btn-xs" title="Delete User" onclick="return confirm('Are you sure?')">
                                <i class="fa fa-trash"></i>
                            </a> --}}
                            <a href="{{ route('delete-user-by-SAdmin',['id'=>$user->id]) }}"
                             class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Delete User" onclick="return confirm('Are you sure?')">
                             <i class="fa fa-trash"></i>
                        </a>
                     </div>
                 </div>

             </td>
             @endrole
         </tr>
         <div class="modal fade" id="changePassword-{{$user->id}}" role="dialog" tabIndex="-1">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title text-center">Change User Password</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('change-user-password-by-SAdmin') }}" method="post"
                        role="form"
                        class="contactForm">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class=" col-md-3 form-group">
                                <label>Password</label>
                                <input type="hidden" value="{{$user->id}}" name="user_id">
                            </div>
                            <div class=" col-md-8 form-group">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-3 form-group">
                                <label>Confirm Password</label>
                            </div>
                            <div class=" col-md-8 form-group">
                                <input type="password" class="form-control" name="password_confirmation">
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
    </div>
    <div class="modal fade" id="changeRole-{{$user->id}}" role="dialog" tabIndex="-1">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Change User Role</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('change-user-role-by-SAdmin') }}" method="post"
                    role="form"
                    class="contactForm">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class=" col-md-8 form-group">
                            <input type="hidden" value="{{$user->id}}" name="id">
                            {{--<input type="hidden" value="{{$role}}" name="roleOfCurrentPage">--}}
                            <select class="form-control" name="userRole">
                                @foreach($roles as $role)
                                @if($role->name !='Super Admin')
                                <option value="{{$role->name}}">{{$role->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="submit" class="btn btn-warning" value="Submit"
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
</div>
@endforeach
</table>

</div>


</section>
<div class="float-right">
    {{ $userList->links() }}
</div>
</div>
</div>
</div>
<br/>&nbsp;
<br/>&nbsp;
</section>
@endsection