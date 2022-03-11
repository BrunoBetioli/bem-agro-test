@extends('layouts.auth-master')

@section('content')
    <p class="login-box-msg">Register a new user</p>

    <form action="{{ route('register.perform') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        @if ($errors->has('name'))
            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
        @endif
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full name" />
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-id-card"></span>
                </div>
            </div>
        </div>
        @if ($errors->has('email'))
            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
        @endif
        <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" />
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        @if ($errors->has('username'))
            <span class="text-danger text-left">{{ $errors->first('username') }}</span>
        @endif
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" />
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
        @if ($errors->has('password'))
            <span class="text-danger text-left">{{ $errors->first('password') }}</span>
        @endif
        <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" />
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        @if ($errors->has('password_confirmation'))
            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
        @endif
        <div class="input-group mb-3">
            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Retype password" />
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- /.col -->
            <div class="col-4 offset-8">
                <button type="submit" class="btn btn-success btn-block">Register</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <a href="{{ route('login.perform') }}" class="text-center">I'm already registered</a>
@endsection