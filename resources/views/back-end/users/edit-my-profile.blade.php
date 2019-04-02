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
                @if(Session::get('message'))
                    <div class="alert alert-success" id="message">
                        <h3 class=" text-center text-success"> {{ Session::get('message') }}</h3>
                    </div>
                @endif
                <section class="card">
                    <div class="card-header">

                        <h3 class="center">Profile</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('update-admin-profile') }}" enctype='multipart/form-data'>
                            @csrf

                            <div class="form-group row">
                                <label for="Name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="border form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ Auth::user()->name }}" required>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="old_password" type="text" value="{{ Auth::user()->email }}"
                                           class="border form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" readonly name="email"
                                           value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_no"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Phone No') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_no" type="text" class="border form-control" value="{{ Auth::user()->phone_no }}"
                                           name="phone_no" required>
                                    <span class="text-danger">{{ $errors->has('phone_no') ? $errors->first('phone_no') : ' ' }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="border form-control" value="{{ Auth::user()->address }}"
                                           name="address" required>
                                    <span class="text-danger">{{ $errors->has('address') ? $errors->first('address') : ' ' }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Profile Picture') }}</label>

                                <div class="col-md-6">
                                    <input type="file" class="border form-control"
                                           name="image" accept="image/*" >
                                    <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : ' ' }}</span>
                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="Save" name="btn" class="btn btn-info btn-block"/>

                                </div>
                            </div>
                        </form>
                    </div>
                </section>

            </div>
        </div>
    </div>



@endsection