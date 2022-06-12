<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SI MAPAN</title>
  <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('dist/img/simapan-icon.png') }}">

@include('includes.styles')
</head>
<body class="hold-transition layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('dist/img/icon-simapan.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  @include('includes.guest.nav')


  <!-- Content Wrapper. Contains page content -->
  <div class="wrapper">

    <section class="content">
      <div class="container-fluid">
        
        @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('includes.scripts')

@yield('scripts-bottom')

</body>
</html>
