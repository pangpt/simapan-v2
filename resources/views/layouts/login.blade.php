<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SI MAPAN | Dashboard</title>

  <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('dist/img/simapan-icon.png') }}">
  @include('includes.login.styles')
</head>
<body class="hold-transition">
<!-- Navbar -->
<nav class="navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('simapan.index')}}" class="nav-link"><img src="{{asset('/dist/img/nav-logo.png')}}" alt="" style="max-width:300px"></a>
      </li>
    </ul>


  </nav>
  <!-- /.navbar -->
<div class="login-box">
  <!-- /.login-logo -->
  @yield('content')
  <!-- /.card -->
</div>
<!-- /.login-box -->

@include('includes.login.scripts')
</body>
</html>
