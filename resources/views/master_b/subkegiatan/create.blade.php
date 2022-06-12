@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Input Sub Kegiatan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Sub Kegiatan</a></li>
            <li class="breadcrumb-item active">Input Sub Kegiatan</li>
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
              <h3 class="card-title">Form Input Sub Kegiatan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('subkegiatan.input')}}" method="POST">
                @csrf
              <div class="card-body">
                <div class="form-group">
                    <label>Kegiatan</label>
                    <select class="form-control select2" style="width: 100%;" name="kegiatan_id">
                        <option value="">- Pilih Sub Kegiatan -</option>
                        @foreach($kegiatan as $kegiatanid)
                            <option value="{{$kegiatanid->id}}">{{$kegiatanid->kode_kegiatan}} - {{$kegiatanid->nama_kegiatan}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kode Sub Kegiatan</label>
                    <input type="text" class="form-control" name="kode_sub_kegiatan" placeholder="Kode Sub Kegiatan">
                  </div>
                <div class="form-group">
                  <label>Nama Kegiatan</label>
                  <input type="text" class="form-control" name="nama_sub_kegiatan" placeholder="Nama Sub Kegiatan">
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
