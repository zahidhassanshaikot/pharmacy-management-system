@extends('back-end.master')
@section('title')
User
@endsection

@section('activeUser')
active
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <section class="card">
                    <div class="card-header">
                        {{--                        <h3 class="center">{{$role->name}}</h3>--}}
                        <h3 class="center">Profile</h3>
                    </div>
                    <div class="card-body">

                        @if(Session::get('message'))
                            <div class="alert alert-success" id="message">
                                <h3 class=" text-center text-success"> {{ Session::get('message') }}</h3>
                            </div>
                        @endif
                        <div class="row">
                         <div class="col-md-8">
                            <table class="table" width="100%">
                                <tr class="">
                                    <th style="width: 50%" class="" scope="col">Name</th>
                                    <td style="width: 50%" data-title="Name">{{ Auth::user()->name }}</td>

                                </tr>
                                <tr class="">
                                    <th scope="col">Email</th>
                                    <td data-title="Email">{{ Auth::user()->email }}</td>
                                </tr>
                                <tr class="">
                                    <th scope="col">Phone No</th>
                                    <td data-title="Email">{{ Auth::user()->phone_no }}</td>
                                </tr>
                                <tr class="">
                                    <th scope="col">Address</th>
                                    <td data-title="Email">{{ Auth::user()->address }}</td>
                                </tr>
                                <tr class="">
                                    <th scope="col">Role</th>
                                    <td data-title="Role">
                                        @if(Auth::user()->hasRole('Super Admin'))
                                        Super Admin
                                        @elseif(Auth::user()->hasRole('Admin'))
                                        Admin
                                        @elseif(Auth::user()->hasRole('Editor'))
                                        Editor
                                        @endif
                                    </td>
                                </tr>
                                <tr class="">
                                    <th scope="col">
                                        <a class="btn btn-block btn-facebook" href="{{route('password-change')}}">Change Password</a>
                                    </th>
                                    <td data-title="">

                                        <a class="btn btn-block btn-info" href="{{route('edit-admin-profile')}}">Edit Profile</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                         <div class="col-md-4 float-right">
                             @if(!empty(Auth::user()->image))
                            <img src="{{ asset(Auth::user()->image) }}" style="height: 300px;" class="img-thumbnail">
                            @else
                            <img src="{{ asset('images/d_profilePic.png') }}" style="height: 300px;" class="img-thumbnail">
                            @endif
                        </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>



@endsection