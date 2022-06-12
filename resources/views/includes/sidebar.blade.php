<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/icon-simapan.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-1" style="opacity: .8">
      <span class="brand-text font-weight-light">SI MAPAN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
          Login Sebagai : <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link  {{Request::segment(1) == 'dashboard' ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
          </li>
          @if(Auth::user()->level == '307509')
          <li class="nav-item">
            <a href="#" class="nav-link {{Request::segment(1) == 'master' ? 'active' : ''}}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{('/master/menu')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{('/master/submenu')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kegiatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{('/master/kategori')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>KRO</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{('/master/subcat')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>RO</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{('/master/kegiatan')}}"class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Komponen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{('/master/subkegiatan')}}"class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Akun</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{('/master/rincian')}}"class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Detil</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('perencanaan.index')}}" class="nav-link {{Request::segment(1) == 'perencanaan' ? 'active' : ''}}">
              <i class="nav-icon fas fa-table"></i>
                <p>
                  Perencanaan
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{('/realisasi')}}" class="nav-link  {{Request::segment(1) == 'realisasi' ? 'active' : ''}}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Realisasi Anggaran
              </p>
            </a>
          </li>
          @elseif(Auth::user()->username == '309076')
          <li class="nav-item">
            <a href="#" class="nav-link {{Request::segment(1) == 'master_satker' ? 'active' : ''}}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{('/master_satker/program')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Program</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{('/master_satker/kegiatan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kegiatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{('/master_satker/subkegiatan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>KRO</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{('/master_satker/menu')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>RO</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{('/master_satker/rincian')}}"class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Komponen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{('/master_satker/detil')}}"class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Akun</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{('/master_satker/uraian')}}"class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Detil</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('perencanaansatker.index')}}" class="nav-link {{Request::segment(2) == 'perencanaan' ? 'active' : ''}}">
              <i class="nav-icon fas fa-table"></i>
                <p>
                  Perencanaan
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('realisasisatker.index')}}" class="nav-link  {{Request::segment(1) == 'realisasi' ? 'active' : ''}}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Realisasi Anggaran
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
