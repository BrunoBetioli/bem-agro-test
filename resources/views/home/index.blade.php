@extends('layouts.app-master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-body">
                        @auth
                        <p class="lead">Welcome, {{auth()->user()->name}}.</p>
                        @endauth

                        @guest
                        <p class="lead">Welcome, Guest.</p>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection