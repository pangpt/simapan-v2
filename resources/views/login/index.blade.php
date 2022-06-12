@extends('layouts.login')

@section('content')

@if(session('error'))
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h6><i class="icon fas fa-ban"></i> {{session('error')}}</h6>
  </div>
@endif
<div class="card card-outline card-primary" style="position:absolute; top: 50%; top: 50%;
left: 50%;
margin: -25px 0 0 -25px;transform: translate(-50%, -50%);">
    <div class="card-header text-center">
      <img src="{{asset('dist/img/pic-login.png')}}" style="max-width:330px; max-height:100px" alt="">
    </div>
    <div class="card-body">
      <p class="login-box-msg">Selamat Datang, Silahkan Login</p>
      <form action="{{route('login')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col align-self-center">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>

          <!-- /.col -->
        </div>
      </form>
      <p class="mt-4 mb-4">
            <a href="{{route('simapan.index')}}">Kembali ke Halaman Utama</a>
          </p>
          <div class="text-center">
            <strong>Powered by <a href="https://simapan.pa-watampone.net">www.simapan.pa-watampone.net</a></strong>

          </div>

    </div>
    <!-- /.card-body -->

  </div>


@endsection
