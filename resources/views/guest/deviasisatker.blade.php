@extends('layouts.guest')

@section('content')
      <div class="row justify-content-center">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner text-center">
                <h3>PERENCANAAN</h3>
              </div>
              <a href="{{route('perencanaansatker')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner text-center">
                <h3>REALISASI</h3>
              </div>
              <a href="{{route('realisasisatker')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner text-center">
                <h3>SISA PAGU</h3>
              </div>
              <a href="{{route('sisapagu.satker')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner text-center">
                <h3>DEVIASI HAL III</h3>
              </div>
              <a href="{{route('deviasi.satker')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner text-center">
                <h3>SIMULASI RKK</h3>
              </div>
              <a href="{{route('simulasi.satker')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        
      <div class="card img-fluid">
        <img class="card-img-top" src="../dist/img/jangka-panjang.png" alt="Card image" style="width:100%">
        <div class="card-img-overlay">
        </div>
      </div>
      <!-- /.card -->

@endsection

@section('scripts-bottom')

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

      table = $('#example2').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "responsive": true,

      });
    });

    $('#filter-tanggal').on('change', function() {
        tanggal = $('#filter-tanggal').val();
        console.log(tanggal)
    })

    $('#cetak').on('click', function(){
      tgl = $('#filter-tanggal').val();
    })
  </script>

@endsection
