@extends('layouts.auth-master')

@section('content')
    <p class="login-box-msg">Sign in to start your session</p>

    @include('layouts.partials.messages')
    <form action="{{ route('login.perform') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        @if ($errors->has('username'))
            <span class="text-danger text-left">{{ $errors->first('username') }}</span>
        @endif
        <div class="input-group mb-3">
            <input type="email" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username or Email" />
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
        <div class="row">
            <!-- /.col -->
            <div class="col-4 offset-8">
                <button type="submit" class="btn btn-success btn-block">Sign In</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <p class="mb-0">
        <a href="{{ route('register.perform') }}" class="text-center">Register a new user</a>
    </p>
@endsection