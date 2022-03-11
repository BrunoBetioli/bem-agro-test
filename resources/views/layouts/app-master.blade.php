<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Teste prático Bem Agro</title>

    <link rel="icon" href="{!! url('assets/img/logo-icon.png') !!}" type="image/png" />

    @if(isset($metaCSRF) && $metaCSRF != false)
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @endif

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{!! url('plugins/fontawesome-free/css/all.min.css') !!}" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{!! url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') !!}" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{!! url('assets/adminlte/css/adminlte.css') !!}" />
    <!-- jQuery -->
    <script src="{!! url('plugins/jquery/jquery.min.js') !!}"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">  
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="@auth{!! auth()->user()->image ?? url('assets/img/user.png') !!}@else{!! url('assets/img/default.jpg') !!}@endauth" class="user-image img-circle elevation-2" alt="@auth{{auth()->user()->name}}@else{{'Guest'}}@endauth Image" />
                        <span class="d-none d-md-inline">@auth{{auth()->user()->name}}@else{{'Guest'}}@endauth</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-success">
                            <img src="@auth{!! auth()->user()->image ?? url('assets/img/user.png') !!}@else{!! url('assets/img/default.jpg') !!}@endauth" class="img-circle elevation-2 bg-white" alt="@auth{{auth()->user()->name}}@else{{'Guest'}}@endauth Image" />
                            <p>@auth{{auth()->user()->name}}@else{{'Guest'}}@endauth</p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            @guest
                            <a href="{{ route('register.perform') }}" class="btn btn-success btn-flat float-left">Sign Up</a>
                            @endguest
                            <a href="@auth{{ route('logout.perform') }}@else{{ route('login.perform') }}@endauth" class="btn btn-success btn-flat float-right">@auth{{'Logout'}}@else{{'Login'}}@endauth</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('home.index') }}" class="brand-link">
            <img src="{!! url('assets/img/logo-icon.png') !!}" alt="Bem Agro Logo" class="brand-image elevation-3" style="opacity: .8" />
            <span class="brand-text font-weight-light">Bem Agro</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="@auth{!! auth()->user()->image ?? url('assets/img/user.png') !!}@else{!! url('assets/img/default.jpg') !!}@endauth" class="img-circle elevation-2" alt="@auth{{auth()->user()->name}}@else{{'Guest'}}@endauth Image" />
                </div>
                <div class="info">
                    <span class="text-light d-block">
                        @auth{{auth()->user()->name}}@else{{'Guest'}}@endauth
                    </span>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('home.index') }}" class="nav-link{{$homeActive??null}}">
                            <i class="nav-icon fas fa-home"></i><p>Home</p>
                        </a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link{{$usersActive??null}}">
                            <i class="nav-icon fas fa-users"></i><p>Users</p>
                        </a>
                    </li>
                    @endauth
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{$namePage}}</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; {{date('Y')}} <a href="https://www.linkedin.com/in/bruno-betioli/">Bruno Betioli</a>.</strong> All rights reserved.
        </footer>

    </div>
    <!-- ./wrapper -->

<!-- Bootstrap 4 -->
<script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
<!-- overlayScrollbars -->
<script src="{!! url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! url('assets/adminlte/js/adminlte.min.js') !!}"></script>
<!-- AdminLTE for demo purposes -->
<!--<script src="../../dist/js/demo.js"></script>-->
</body>
</html>