@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Input Realisasi Anggaran</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Realisasi Anggaran</a></li>
            <li class="breadcrumb-item active">Input Realisasi Anggaran</li>
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
              <h3 class="card-title">Form Input SPP</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">No. DIPA</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="No. DPA">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Supplier</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Judul Kegiatan">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Alamat</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Judul Kegiatan">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">NPWP</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Judul Kegiatan">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">No. Rekening</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Judul Kegiatan">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Jenis Belanja</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Judul Kegiatan">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Sumber Dana</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Judul Kegiatan">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Judul Kegiatan">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
