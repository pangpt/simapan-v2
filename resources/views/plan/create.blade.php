@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Input Perencanaan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Perencanaan</a></li>
            <li class="breadcrumb-item active">Input Perencanaan</li>
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
              <h3 class="card-title">Form Input Perencanaan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('perencanaan.input')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                  <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                            <label>Jenis Revisi</label>
                            <select class="form-control select2" style="width:100%" name="jenis_revisi">
                                  <option value="">- Pilih Jenis Revisi -</option>
                                  <option value="RPD Triwulan">RPD Triwulan</option>
                                  <option value="POK">POK</option>
                                  <option value="Antar Satker">Antar Satker</option>
                                  <option value="Es 1">Es 1</option>
                              </select>
                        </div>
                        </div>
                      <div class="col-6">
                        <div class="form-group">
                            <label>Tanggal Revisi</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" name="tanggal_revisi" data-target="#reservationdate"/>
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                      </div>
                      </div>
                <div class="form-group">
                    <label>Menu Kegiatan</label>
                    <select class="form-control select2" style="width: 100%;" name="menu_id">
                      <option value="">- Pilih Menu - </option>
                      @foreach($menu as $menuid)
                        <option value="{{$menuid->kode_menu}}-{{$menuid->nama_menu}}">
                            {{$menuid->kode_menu}}-{{$menuid->nama_menu}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Sub Menu Kegiatan</label>
                    <select class="form-control select2" style="width: 100%;" name="submenu_id">
                      <option value="">- Pilih Sub Menu - </option>
                      @foreach($submenu as $submenuid)
                        <option value="{{$submenuid->kode_submenu}}-{{$submenuid->nama_submenu}}">
                            {{$submenuid->kode_submenu}}-{{$submenuid->nama_submenu}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Kategori Kegiatan</label>
                    <select class="form-control select2" style="width: 100%;" name="category_id">
                      <option value="">- Pilih Kategori - </option>
                      @foreach($category as $categoryid)
                        <option value="{{$categoryid->kode_kategori}}-{{$categoryid->nama_kategori}}">
                            {{$categoryid->kode_kategori}}-{{$categoryid->nama_kategori}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Sub Kategori Kegiatan</label>
                    <select class="form-control select2" style="width: 100%;" name="subcat_id">
                      <option value="">- Pilih Sub Kategori - </option>
                      @foreach($subcat as $subcatid)
                        <option value="{{$subcatid->kode_subcat}} -{{$subcatid->nama_subcat}}">
                            {{$subcatid->kode_subcat}}-{{$subcatid->nama_subcat}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Kegiatan</label>
                    <select class="form-control select2" style="width: 100%;" name="kegiatan_id">
                      <option value="">- Pilih Kegiatan - </option>
                      @foreach($kegiatan as $kegiatanid)
                        <option value="{{$kegiatanid->kode_kegiatan}}-{{$kegiatanid->nama_kegiatan}}">
                            {{$kegiatanid->kode_kegiatan}}-{{$kegiatanid->nama_kegiatan}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Sub Kegiatan</label>
                    <select class="form-control select2" style="width: 100%;" name="sub_kegiatan_id">
                      <option value="">- Pilih Sub Kegiatan - </option>
                      @foreach($sub_kegiatan as $sub_kegiatanid)
                        <option value="{{$sub_kegiatanid->kode_sub_kegiatan}}-{{$sub_kegiatanid->nama_sub_kegiatan}}">
                            {{$sub_kegiatanid->kode_sub_kegiatan}}-{{$sub_kegiatanid->nama_sub_kegiatan}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Rincian Kegiatan</label>
                    <select class="form-control select2" style="width: 100%;" name="rincian_id">
                      <option value="">- Pilih Rincian - </option>
                      @foreach($rincian as $rincianid)
                        <option value="{{$rincianid->id}}">
                             - {{$rincianid->nama_rincian}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah Pagu (Per Tahun) - Rp. <span id="pagu_rupiah" style="color:red"></span>,-</label>
                  <input type="text" class="form-control" id="pagu_total" name="pagu_total" placeholder="">
                </div>
              </div>
              <!-- /.card-body -->

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
  $('#reservationdate').datetimepicker({
        format: 'L'
    });

      $(document).ready(function () {
          $('.select2').select2();
          //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
      });

      function formatNumber(angka) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return rupiah;
    }
    $(window).on('load',function(){
        $('#pagu_total').on('keyup',function(){
            id = $(this).data('id');
            pagu_total = $(this).val();
            // harga = $('#harga').val();
            // total = harga*$(this).val();
            console.log(pagu_total)
            $('#pagu_rupiah').html(formatNumber(pagu_total.toString()));
        });
    });


  </script>
  @endsection
