@extends('layouts.master')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Perencanaan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Realisasi Anggaran</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <div class="row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <a href="{{route('plan.create')}}" <button type="button" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Input Realisasi</button></a>
          </ol>
        </div><!-- /.col -->
      </div>
    </div><!-- /.container-fluid -->
  </div>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Uraian</th>
                    <th>Jumlah Pagu</th>
                    <th>Jumlan Rencana</th>
                    <th>Proses</th>
                  </tr>
                  </thead>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

@section('scripts-bottom')

<script>
    $(function () {
      dataTable = $('#example2').DataTable({
        processing : true,
        responsive : true,
        serverSide : true,
        paging: true,
        lengthChange: false,
        searching: true,
        order: [],
        info: true,
        autoWidth: false,
        ajax : {
          url: "{{route('plan.index')}}",
          type: "GET",
        },

        columns: [
          {data: "kode","orderable":false},
          {data: "parent_id","orderable":false},
          {data: "children","orderable":false},
          {data: "uraian","orderable":false},
          {data: "uraian","orderable":false},
          // {data: "aksi","orderable": false,class:"text-center"}
        ],

      });
    });
  </script>

@endsection
