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
            <form action="{{route('subcat.input')}}" method="POST">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>Kode Kategori</label>
                  <select class="form-control select2" style="width: 100%;" name="category_id">
                    <option value="">- Pilih Kategori -</option>
                    @foreach($cat as $catid)
                        <option value="{{$catid->id}}">
                            {{$catid->kode_kategori}} - {{$catid->nama_kategori}}
                        </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Kode Sub Kategori</label>
                  <input type="text" class="form-control" name="kode_subcat" placeholder="Kode Sub Kategori">
                </div>
                <div class="form-group">
                  <label>Nama Sub Kategori</label>
                  <input type="text" class="form-control" name="nama_subcat" placeholder="Nama Sub Kategori">
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


