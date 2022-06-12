@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Input Sub Menu Kegiatan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Sub Menu Kegiatan</a></li>
            <li class="breadcrumb-item active">Tambah Sub Menu</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form Tambah Sub Menu</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('submenu.input')}}" method="POST">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>Kode Menu</label>
                  <select class="form-control select2" style="width: 100%;" name="menu_id">
                    @foreach($menu as $menuid)
                        <option value="">- Pilih Menu -</option>
                        <option value="{{$menuid->id}}">{{$menuid->kode_menu}} - {{$menuid->nama_menu}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Kode Sub Menu</label>
                  <input type="text" class="form-control" name="kode_submenu" placeholder="Kode Sub Menu">
                </div>
                <div class="form-group">
                  <label>Nama Sub Menu</label>
                  <input type="text" class="form-control" name="nama_submenu" placeholder="Nama Sub Menu">
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  @endsection

  @section('scripts-bottom')
  <script type="text/javascript">
        $(document).ready(function () {
            $('.select2').select2();
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
  </script>
  @endsection
