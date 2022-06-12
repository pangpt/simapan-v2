@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Input Kategori Kegiatan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Kategori Kegiatan</a></li>
            <li class="breadcrumb-item active">Tambah Kategori</li>
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
              <h3 class="card-title">Form Tambah Kategori</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('kategori.input')}}" method="POST">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>Kode Sub Menu</label>
                  <select class="form-control select2" style="width: 100%;" name="submenu_id">
                    <option value="">- Pilih Menu -</option>
                    @foreach($submenu as $submenuid)
                        <option value="{{$submenuid->id}}">
                        {{$submenuid->kode_submenu}} - {{$submenuid->nama_submenu}}
                        </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Kode Kategori</label>
                  <input type="text" class="form-control" name="kode_kategori" placeholder="Kode Kategori">
                </div>
                <div class="form-group">
                  <label>Nama Kategori</label>
                  <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori">
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
