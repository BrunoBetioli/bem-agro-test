<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Teste prático Bem Agro</title>

    <link rel="icon" href="{!! url('assets/img/logo-icon.png') !!}" type="image/png" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{!! url('plugins/fontawesome-free/css/all.min.css') !!}" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{!! url('assets/adminlte/css/adminlte.css') !!}" />
</head>
<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-success">
            <div class="card-header text-center">
                <a href="{{ route('home.index') }}" class="h1">Bem Agro</a>
            </div>
            <div class="card-body">
                @yield('content')
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

<!-- jQuery -->
<script src="{!! url('plugins/jquery/jquery.min.js') !!}"></script>
<!-- Bootstrap 4 -->
<script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! url('assets/adminlte/js/adminlte.min.js') !!}"></script>
</body>
</html>