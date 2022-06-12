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
            <form action="{{route('perencanaansatker.input')}}" method="POST" enctype="multipart/form-data">
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
                            <div class="input-group date">
                                <input type="date" class="form-control" name="tanggal_revisi"/>
                            </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label>Program</label>
                          <select class="form-control select2" style="width:100%" name="program_id">
                                  <option value="">- Pilih Program -</option>
                                    @foreach($programsatker as $programid)
                                        <option value="{{$programid->id}}">{{$programid->kode_program}} - {{$programid->nama_program}}</option>
                                    @endforeach
                              </select>
                        </div>
                      </div>
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
