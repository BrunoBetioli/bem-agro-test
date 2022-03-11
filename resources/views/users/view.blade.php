@extends('layouts.app-master')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-success card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="{!! $user->image ?? url('assets/img/user.png') !!}"
                                alt="{!! $user->name !!} picture">
                            </div>

                            <h3 class="profile-username text-center">{!! $user->github_data['name'] !!}</h3>

                            <p class="text-muted text-center">{!! $user->github_data['login'] !!}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Followers</b> <a class="float-right">{!! $user->github_data['followers'] !!}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Following</b> <a class="float-right">{!! $user->github_data['following'] !!}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Public repositories</b> <a class="float-right">{!! $user->github_data['public_repos'] !!}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <!-- About Me Box -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">About {!! $user->name !!}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="far fa-building mr-1"></i> Company</strong>

                            <p class="text-muted">{!! $user->github_data['company'] !!}</p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted">{!! $user->github_data['location'] !!}</p>

                            <hr>

                            <strong><i class="far fa-file mr-1"></i> Bio</strong>

                            <p class="text-muted">{!! $user->github_data['bio'] !!}</p>

                            <hr>

                            <strong><i class="fab fa-github mr-1"></i> Github member</strong>

                            <p class="text-muted">Since {!! $user->github_data['created_at'] !!}</p>

                            <hr>

                            <strong><i class="fas fa-link mr-1"></i> Links</strong>

                            <div class="mt-2 row">
                                @if ($user->github_data['html_url'])
                                <div class="col-3">
                                    <p class="text-muted"><a href="{!! $user->github_data['html_url'] !!}">Github</a></p>
                                </div>
                                @endif

                                @if ($user->github_data['twitter_username'])
                                <div class="col-3">
                                    <p class="text-muted"><a href="https://twitter.com/{!! $user->github_data['twitter_username'] !!}">Twitter</a></p>
                                </div>
                                @endif

                                @if ($user->github_data['email'])
                                <div class="col-3">
                                    <p class="text-muted"><a href="mailto:{!! $user->github_data['email'] !!}">Email</a></p>
                                </div>
                                @endif

                                @if ($user->github_data['blog'])
                                <div class="col-3">
                                    <p class="text-muted"><a href="//{!! $user->github_data['blog'] !!}">Site or blog</a></p>
                                </div>
                                @endif
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
