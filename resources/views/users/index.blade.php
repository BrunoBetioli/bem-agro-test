@extends('layouts.app-master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @include('layouts.partials.messages')
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Users</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <a href="#" data-name="{{$user->name}}" data-username="{{$user->username}}" data-github-user="{{ route('user.github', $user->id) }}"  class="btn btn-dark btn-sm github-search" type="submit" title="Search {{$user->name}} in GitHub"><i class="fab fa-github"></i><span class="d-none">Search {{$user->name}} in GitHub</span></a>
                                            <a href="{{ route('user.view', $user->id) }}"  class="btn btn-primary btn-sm" type="submit" title="View {{$user->name}} data in GitHub"><i class="fas fa-eye"></i><span class="d-none">View {{$user->name}} data in GitHub</span></a>
                                            <form action="{{ route('user.delete', $user->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit" title="Delete {{$user->name}}"><i class="fas fa-trash"></i><span class="d-none">Delete {{$user->name}}</span></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--<div class="card-footer">
                        Footer
                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(".github-search").on("click", function(e){
                e.preventDefault();
                var username = $(this).data("username"),
                    name = $(this).data("name"),
                    urlGithubUser = $(this).data("github-user");

                $.getJSON("https://api.github.com/users/" + username)
                    .done(function(response){
                        console.log(response);
                        $(document).Toasts("create", {
                            title: "Username found",
                            body: "The username <strong>" + username + "</strong> has been found in Github and is going to be linked to the user " + name + ".",
                            class: "bg-success"
                        });
                        $.ajax({
                            url: urlGithubUser, 
                            data: { github_data: response },
                            type: "post",
                            dataType: "json",
                            headers: {
                                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                            },
                            success: function(data){
                                console.log(data);
                            },
                            error: function(data){
                                $(document).Toasts("create", {
                                    title: "Error",
                                    body: "An error occurred.",
                                    class: "bg-danger"
                                });
                            },
                        });
                    })
                    .fail(function(){
                        $(document).Toasts("create", {
                            title: "Not found",
                            body: "The username <strong>" + username + "</strong> was not found in Github.",
                            class: "bg-danger"
                        });
                    });
            });
        });
    </script>
@endsection