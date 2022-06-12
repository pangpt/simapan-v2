@extends('layouts.master')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Realisasi</h1>
        </div><!-- /.col -->

      </div><!-- /.row -->
      <div class="row mb-2">
        
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-left">
            <a href="{{route('realisasisatker.create')}}" <button type="button" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Input Realisasi</button></a>
          </ol>
        </div><!-- /.col -->
        <div class="col-sm-6">
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
                <div class="row">
                    <div class="col-3">
                        <form action="{{route('filter.realisasisatker')}}" method="get">
                            <!-- @csrf -->
                            <div class="form-group">
                            <select class="form-control select2" style="width:100%" name="bulan">
                                  <option value="">- Pilih Bulan -</option>
                                  @foreach($month as $mo)
                                        <option value="{{$mo->name}}">{{$mo->name}}</option>
                                    @endforeach
                              </select>
                            </div>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary btn-md">Filter</button>
                            </div>
                        </form>
                    </div>
                    @if($cekbul == null)
                      Realisasi Anggaran  bulan : <strong>{{Carbon\Carbon::now()->isoFormat('MMMM')}}</strong>
                      @else
                      Realisasi Anggaran  bulan : <strong>{{$cekbul}}</strong>
                      @endif
                      @if(session('error'))
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fas fa-ban"></i> {{session('error')}}</h6>
          </div>
        @endif
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Uraian</th>
                    <th>Tanggal Kuitansi</th>
                    <th>Jumlah</th>
                    <th>Penerima Uang</th>
                    <th>Keterangan</th>
                    <th>Proses</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach($data as $key)
                        <tr style="background-color:yellow">
                            <td>{{@$key->program_satker->kode_program}}</td>
                            <td><a class="btn-key" data-id="{{$key->id}}" href="#" data-toggle="modal" data-target="#modal-default">{{@$key->program_satker->nama_program}}</a></td>
                            <td>{{Carbon\Carbon::parse(@$key->tanggal_kuitansi)->format('d-m-Y')}}</td>
                            <td>{{number_format(@$key->jumlah, 0,",",".")}}</td>
                            <td>{{@$key->penerima}}</td>
                            <td>{{@$key->keterangan}}</td>
                            <td>
                                <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapusrealsatker',['id' => $key->id])}}">
                                    <i class="fas fa-trash">
                                    </i>
                                </a>
                            </td>
                        </tr>
                        @if($key->children->count())
                        @foreach($key->children as $child)
                        <tr style="background-color: rgb(247, 238, 238)">
                            <td>{{@$child->kegiatan_satker->kode_kegiatan}}</td>
                            <td>
                                    <a class="btn-child" href="#" data-toggle="modal" data-target="#modal-sub_kegiatan" data-id="{{$child->id}}" data-name="">{{@$child->kegiatan_satker->nama_kegiatan}}</a>
                            </td>
                            <td>{{Carbon\Carbon::parse(@$child->tanggal_kuitansi)->format('d-m-Y')}}</td>
                            <td>{{number_format(@$child->jumlah, 0,",",".")}}</td>
                            <td>{{@$child->penerima}}</td>
                            <td>{{@$child->keterangan}}</td>
                            <td>
                                <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapusrealsatker',['id' => $child->id])}}">
                                    <i class="fas fa-trash">
                                    </i>
                                </a>
                            </td>
                        </tr>
                        @if($child->children->count())
                        @foreach($child->children as $gchild)
                            <tr style="background-color: rgb(139, 221, 107)">
                               <td>{{@$gchild->sub_kegiatan_satker->kode_subkegiatan}}</td>
                                <td>
                                    <a class="btn-gchild" href="#" data-toggle="modal" data-target="#modal-menu" data-id="{{$gchild->id}}" data-name="">{{@$gchild->sub_kegiatan_satker->nama_subkegiatan}}</a>
                                </td>
                                <td>{{Carbon\Carbon::parse(@$gchild->tanggal_kuitansi)->format('d-m-Y')}}</td>
                                <td>{{number_format(@$gchild->jumlah, 0,",",".")}}</td>
                                <td>{{@$gchild->penerima}}</td>
                                <td>{{@$gchild->keterangan}}</td>
                                <td>
                                    <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapusrealsatker',['id' => $gchild->id])}}">
                                        <i class="fas fa-trash">
                                        </i>
                                    </a>
                            </td>
                            </tr>
                            @if($gchild->children->count())
                            {{-- {{dd($gchild->children)}} --}}
                            @foreach($gchild->children as $ggchild)
                                <tr style="background-color: rgb(255, 106, 106)">
                                    <td>{{@$ggchild->menu_satker->kode_menu}}</td>
                                    <td>
                                        <a class="btn-ggchild" href="#" data-toggle="modal" data-target="#modal-rincian" data-id="{{$ggchild->id}}">{{@$ggchild->menu_satker->nama_menu}}</a>
                                    </td>
                                    <td>{{Carbon\Carbon::parse(@$ggchild->tanggal_kuitansi)->format('d-m-Y')}}</td>
                                    <td>{{number_format(@$ggchild->jumlah, 0,",",".")}}</td>
                                    <td>{{@$ggchild->penerima}}</td>
                                    <td>{{@$ggchild->keterangan}}</td>
                                    <td>
                                        <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapusrealsatker',['id' => $ggchild->id])}}">
                                            <i class="fas fa-trash">
                                            </i>
                                        </a>
                                </td>
                                </tr>
                                @if($ggchild->children->count())
                                @foreach($ggchild->children as $zchild)
                                    <tr style="background-color: rgb(224, 224, 143)">
                                        <td>{{$zchild->rincian_satker->kode_rincian}}</td>
                                        <td>
                                            <a class="btn-zchild" href="#" data-toggle="modal" data-target="#modal-detil" data-id="{{$zchild->id}}" data-name="">{{$zchild->rincian_satker->nama_rincian}}</a>
                                        </td>
                                        <td>{{Carbon\Carbon::parse(@$zchild->tanggal_kuitansi)->format('d-m-Y')}}</td>
                                        <td>{{number_format(@$zchild->jumlah, 0,",",".")}}</td>
                                        <td>{{@$zchild->penerima}}</td>
                                        <td>{{@$zchild->keterangan}}</td>
                                        <td>
                                            <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapusrealsatker',['id' => $zchild->id])}}">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                    </td>
                                    </tr>
                                    @if($zchild->children->count())
                                    @foreach($zchild->children as $zzchild)
                                    <tr>
                                        <td>{{$zzchild->detil_satker->kode_detil}}</td>
                                        <td>
                                            <a class="btn-zzchild" href="#" data-toggle="modal" data-target="#modal-uraian" data-id="{{$zzchild->id}}" data-name="">{{$zzchild->detil_satker->nama_detil}}</a>
                                        </td>
                                        <td>{{Carbon\Carbon::parse(@$zzchild->tanggal_kuitansi)->format('d-m-Y')}}</td>
                                        <td>{{number_format(@$zzchild->jumlah, 0,",",".")}}</td>
                                        <td>{{@$zzchild->penerima}}</td>
                                        <td>{{@$zzchild->keterangan}}</td>
                                        <td>
                                            <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapusrealsatker',['id' => $zzchild->id])}}">
                                            <i class="fas fa-trash">
                                            </i>
                                        </a>
                                    </td>
                                    </tr>
                                        @if($zzchild->children->count())
                                        @foreach($zzchild->children as $achild)
                                        <tr class="jml">
                                             <td>{{$achild->uraian_satker->kode_uraian}}</td>
                                            <td>{{$achild->uraian_satker->nama_uraian}}
                                            </td>
                                            <td>{{Carbon\Carbon::parse(@$achild->tanggal_kuitansi)->format('d-m-Y')}}</td>
                                            <td id="jml_a" value="{{@$achild->jumlah}}">{{number_format(@$achild->jumlah, 0,",",".")}}</td>
                                            <td>{{@$achild->penerima}}</td>
                                            <td>{{@$achild->keterangan}}</td>
                                            <td>
                                                <a class="btn btn-outline-primary btn-sm btn-real" href="#" data-toggle="modal" data-target="#modal-real"data-id="{{$achild->id}}" data-uraian="{{$achild->uraian}}" data-pagu="{{$achild->pagu_total}}"
                                                    data-jumlah="{{$achild->jumlah}}" data-tanggal="{{$achild->tanggal_kuitansi}}" data-penerima="{{$achild->penerima}}" data-keterangan="{{$achild->keterangan}}">
                                                    Edit
                                                </a>
                                                <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapusrealsatker',['id' => $achild->id])}}">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    @endforeach
                                    @endif
                                @endforeach
                                @endif
                            @endforeach
                            @endif
                        @endforeach
                        @endif
                    @endforeach
                    @endif
                  @endforeach
                  </tbody>
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
      @include('satker.modal_realisasi.modal-program')
      @include('satker.modal_realisasi.modal-kegiatan')
      @include('satker.modal_realisasi.modal-subkegiatan')
      @include('satker.modal_realisasi.modal-menu')
      @include('satker.modal_realisasi.modal-rincian')
      @include('satker.modal_realisasi.modal-detil')
      @include('satker.modal_realisasi.modal-real')


      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

@section('scripts-bottom')

<script>
  $(document).ready(function () {
          $('.select2').select2();
          //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
      });
    $(document).ready(function() {
      
        $('.btn-key').on('click', function() {
            id = $(this).data('id');
            urlKey = window.location.origin + '/satker/kegiatanreal/' + id;

            $('#form-modal-key').attr('action', urlKey);
        });
        $('.btn-child').on('click', function() {
            id = $(this).data('id');
            urlChild = window.location.origin + '/satker/subreal/' + id;
            console.log(urlChild)

            $('#form-modal-child').attr('action', urlChild);
        });
        $('.btn-gchild').on('click', function() {
            id = $(this).data('id');
            urlGchild = window.location.origin + '/satker/menureal/' + id;

            $('#form-modal-gchild').attr('action', urlGchild);
        });
        $('.btn-ggchild').on('click', function() {
            id = $(this).data('id');
            urlGgchild = window.location.origin + '/satker/rincianreal/' + id;

            $('#form-modal-ggchild').attr('action', urlGgchild);
        });
        $('.btn-zchild').on('click', function() {
            id = $(this).data('id');
            urlZchild = window.location.origin + '/satker/detilreal/' + id;

            $('#form-modal-zchild').attr('action', urlZchild);
        });

        $('.btn-zzchild').on('click', function() {
            id = $(this).data('id');
            urlZzchild = window.location.origin + '/satker/uraianreal/' + id;

            $('#form-modal-zzchild').attr('action', urlZzchild);
        });



        $('.btn-real').on('click', function() {
            id = $(this).data('id');
            jumlah = $(this).data('jumlah');
            keterangan = $(this).data('keterangan');
            penerima = $(this).data('penerima');
            tanggal = $(this).data('tanggal');

            console.log(id)

            urlRenc = window.location.origin + '/editrealsatker/' + id;
            
            console.log(urlRenc)
            $('#form-modal-real').attr('action', urlRenc);
            $('#jumlah').attr('value',jumlah);
            $('#keterangan').html(keterangan);
            $('#tanggal').attr('value', tanggal);
            $('#penerima').attr('value', penerima);
        })
    })
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "ordering": false,"autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

@endsection
