<!-- Navbar -->
<nav class="navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('simapan.index')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
    @if(Auth::check())
    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('dashboard')}}" class="btn btn-md btn-primary">Dashboard</a>
      </li>
    </ul>
    @else
    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('login.index')}}" class="btn btn-md btn-primary">Login</a>
      </li>
    </ul>
    @endif

  </nav>
  <!-- /.navbar -->
