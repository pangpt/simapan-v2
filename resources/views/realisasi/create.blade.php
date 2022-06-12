@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Input Realisasi Anggaran</h1>
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
            <form action="{{route('realisasi.input')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                  <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                            <label>Satker</label>
                            <select class="form-control select2" style="width:100%" name="satker">
                                  <option value="">- Pilih Satker -</option>
                                  <option value="307509 - 005.01.WA Program Dukungan Manajemen">307509 - 005.01.WA Program Dukungan Manajemen</option>
                                  <option value="309076 - 005.04.BF Program Penegakan dan Pelayan Hukum">309076 - 005.04.BF Program Penegakan dan Pelayan Hukum</option>
                              </select>
                        </div>
                        </div>
                      <div class="col-6">
                        <div class="form-group">
                            <label>Tanggal Kuitansi</label>
                            <div class="input-group date">
                                <input type="date" class="form-control" name="tanggal_kuitansi">
                            </div>
                        </div>
                      </div>
                      </div>
                        <div class="form-group">
                        <label>Menu Kegiatan</label>
                        <select class="form-control select2" style="width: 100%;" name="menu_id">
                        <option value="">- Pilih Menu - </option>
                        @foreach($menu as $menuid)
                            <option value="{{$menuid->id}}">
                                {{$menuid->kode_menu}}-{{$menuid->nama_menu}}
                            </option>
                            @endforeach
                        </select>
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
