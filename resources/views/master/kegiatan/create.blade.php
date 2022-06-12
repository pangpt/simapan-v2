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
              <h3 class="card-title">Form Input Kegiatan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('kegiatan.input')}}" method="POST">
                @csrf
              <div class="card-body">
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control select2" style="width: 100%;" name="subcat_id">
                        <option value="">- Pilih Kegiatan -</option>
                        @foreach($subcat as $subcatid)
                            <option value="{{$subcatid->id}}">{{$subcatid->kode_subcat}} - {{$subcatid->nama_subcat}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kode Kegiatan</label>
                    <input type="text" class="form-control" name="kode_kegiatan" id="exampleInputPassword1" placeholder="Kode Kegiatan">
                  </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Kegiatan</label>
                  <input type="text" class="form-control" name="nama_kegiatan" id="exampleInputPassword1" placeholder="Nama Kegiatan">
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

  @section('scripts-bottom')
  <script type="text/javascript">
      $(document).ready(function () {
          $('.select2').select2();
          //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
      });
  </script>
  @endsection
