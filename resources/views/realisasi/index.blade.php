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
            <a href="{{route('realisasi.create')}}" <button type="button" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Input Realisasi</button></a>
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
                        <form action="{{route('filter.realisasi')}}" method="get">
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
                            <td>{{@$key->menu->kode_menu}}</td>
                            <td><a class="btn-key" data-id="{{$key->id}}" href="#" data-toggle="modal" data-target="#modal-default">{{@$key->menu->nama_menu}}</a></td>
                            <td>{{Carbon\Carbon::parse(@$key->tanggal_kuitansi)->format('d-m-Y')}}</td>
                            <td>{{@$key->jumlah}}</td>
                            <td>{{@$key->penerima}}</td>
                            <td>{{@$key->keterangan}}</td>
                            <td>
                              <a class="btn btn-success btn-sm btn-total"  type="submit" href="{{route('totalreal',['id' => $key->id])}}"><i class="fas fa-plus">
                                            </i>
                                            Total
                                         </a>
                                <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapusdatareal',['id' => $key->id])}}">
                                    <i class="fas fa-trash">
                                    </i>
                                </a>
                            </td>
                        </tr>
                        @if($key->children->count())
                        @foreach($key->children as $child)
                        <tr style="background-color: rgb(247, 238, 238)">
                            <td>{{@$child->submenu->kode_submenu}}</td>
                            <td>
                                    <a class="btn-child" href="#" data-toggle="modal" data-target="#modal-sub2" data-id="{{$child->id}}" data-name="">{{@$child->submenu->nama_submenu}}</a>
                            </td>
                            <td>{{Carbon\Carbon::parse(@$child->tanggal_kuitansi)->format('d-m-Y')}}</td>
                            <td>{{@$child->jumlah}}</td>
                            <td>{{@$child->penerima}}</td>
                            <td>{{@$child->keterangan}}</td>
                            <td>
                              <a class="btn btn-success btn-sm btn-total"  type="submit" href="{{route('totalreal',['id' => $child->id])}}"><i class="fas fa-plus">
                                            </i>
                                            Total
                                         </a>
                                <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapusdatareal',['id' => $child->id])}}">
                                    <i class="fas fa-trash">
                                    </i>
                                </a>
                            </td>
                        </tr>
                        @if($child->children->count())
                        @foreach($child->children as $gchild)
                            <tr style="background-color: rgb(139, 221, 107)">
                                <td>{{$gchild->category->kode_kategori}}</td>
                                <td>
                                    <a class="btn-gchild" href="#" data-toggle="modal" data-target="#modal-subcat" data-id="{{$gchild->id}}" data-name="">{{$gchild->category->nama_kategori}}</a>
                                </td>
                                <td>{{Carbon\Carbon::parse(@$gchild->tanggal_kuitansi)->format('d-m-Y')}}</td>
                                <td>{{@$gchild->jumlah}}</td>
                                <td>{{@$gchild->penerima}}</td>
                                <td>{{@$gchild->keterangan}}</td>
                                <td>
                                  <a class="btn btn-success btn-sm btn-total"  type="submit" href="{{route('totalreal',['id' => $gchild->id])}}"><i class="fas fa-plus">
                                            </i>
                                            Total
                                         </a>
                                    <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapusdatareal',['id' => $gchild->id])}}">
                                        <i class="fas fa-trash">
                                        </i>
                                    </a>
                            </td>
                            </tr>
                            @if($gchild->children->count())
                            {{-- {{dd($gchild->children)}} --}}
                            @foreach($gchild->children as $ggchild)
                                <tr style="background-color: rgb(255, 106, 106)">
                                    <td>{{$ggchild->subcat->kode_subcat}}</td>
                                    <td>
                                        <a class="btn-ggchild" href="#" data-toggle="modal" data-target="#modal-kegiatan" data-id="{{$ggchild->id}}" data-name="">{{$ggchild->subcat->nama_subcat}}</a>
                                    </td>
                                    <td>{{Carbon\Carbon::parse(@$ggchild->tanggal_kuitansi)->format('d-m-Y')}}</td>
                                    <td>{{@$ggchild->jumlah}}</td>
                                    <td>{{@$ggchild->penerima}}</td>
                                    <td>{{@$ggchild->keterangan}}</td>
                                    <td>
                                      <a class="btn btn-success btn-sm btn-total"  type="submit" href="{{route('totalreal',['id' => $ggchild->id])}}"><i class="fas fa-plus">
                                            </i>
                                            Total
                                         </a>
                                        <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapusdatareal',['id' => $ggchild->id])}}">
                                            <i class="fas fa-trash">
                                            </i>
                                        </a>
                                </td>
                                </tr>
                                @if($ggchild->children->count())
                                @foreach($ggchild->children as $zchild)
                                    <tr style="background-color: rgb(224, 224, 143)">
                                        <td>{{$zchild->kegiatan->kode_kegiatan}}</td>
                                        <td>
                                            <a class="btn-zchild" href="#" data-toggle="modal" data-target="#modal-sub_kegiatan" data-id="{{$zchild->id}}" data-name="">{{$zchild->kegiatan->nama_kegiatan}}</a>
                                        </td>
                                        <td>{{Carbon\Carbon::parse(@$zchild->tanggal_kuitansi)->format('d-m-Y')}}</td>
                                        <td>{{@$zchild->jumlah}}</td>
                                        <td>{{@$zchild->penerima}}</td>
                                        <td>{{@$zchild->keterangan}}</td>
                                        <td>
                                          <a class="btn btn-success btn-sm btn-total"  type="submit" href="{{route('totalreal',['id' => $zchild->id])}}"><i class="fas fa-plus">
                                            </i>
                                            Total
                                         </a>
                                            <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapusdatareal',['id' => $zchild->id])}}">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                    </td>
                                    </tr>
                                    @if($zchild->children->count())
                                    @foreach($zchild->children as $zzchild)
                                    <tr>
                                        <td>{{$zzchild->sub_kegiatan->kode_sub_kegiatan}}</td>
                                        <td>
                                            <a class="btn-zzchild" href="#" data-toggle="modal" data-target="#modal-rincian" data-id="{{$zzchild->id}}" data-name="">{{$zzchild->sub_kegiatan->nama_sub_kegiatan}}</a>
                                        </td>
                                        <td>{{Carbon\Carbon::parse(@$zzchild->tanggal_kuitansi)->format('d-m-Y')}}</td>
                                        <td>{{@$zzchild->jumlah}}</td>
                                        <td>{{@$zzchild->penerima}}</td>
                                        <td>{{@$zzchild->keterangan}}</td>
                                        <td>
                                          <a class="btn btn-success btn-sm btn-total"  type="submit" href="{{route('totalreal',['id' => $zzchild->id])}}"><i class="fas fa-plus">
                                            </i>
                                            Total
                                         </a>
                                            <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapusdatareal',['id' => $zzchild->id])}}">
                                            <i class="fas fa-trash">
                                            </i>
                                        </a>
                                    </td>
                                    </tr>
                                        @if($zzchild->children->count())
                                        @foreach($zzchild->children as $achild)
                                        <tr class="jml">
                                            <td>{{$achild->rincian->kode_rincian}}</td>
                                            <td>{{$achild->rincian->nama_rincian}}
                                            </td>
                                            <td>{{Carbon\Carbon::parse(@$achild->tanggal_kuitansi)->format('d-m-Y')}}</td>
                                            <td id="jml_a" value="{{@$achild->jumlah}}">{{@$achild->jumlah}}</td>
                                            <td>{{@$achild->penerima}}</td>
                                            <td>{{@$achild->keterangan}}</td>
                                            <td>
                                                <a class="btn btn-outline-primary btn-sm btn-edit" href="#" data-toggle="modal" data-target="#modal-edit "data-id="{{$achild->id}}" data-parent="{{$achild->parent_id}}" data-jumlah="{{$achild->jumlah}}" data-penerima="{{$achild->penerima}}" data-ket="{{$achild->keterangan}}" data-tgl="{{$achild->tanggal_kuitansi}}">
                                                    Edit
                                                </a>
                                                <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapusdatareal',['id' => $achild->id])}}">
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
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <!-- <h4 class="modal-title">Default Modal</h4> -->
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-modal-key" action="#" method="POST">
                @csrf
                <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Jenis Kegiatan</label>
                                <select class="form-control select2" style="width: 100%;" name="submenu_id">
                                    <option value="">- Pilih Kegiatan -</option>
                                    @foreach($submenu as $submenuid)
                                        <option value="{{$submenuid->id}}">{{$submenuid->kode_submenu}} - {{$submenuid->nama_submenu}}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- <div class="form-group">
                                <label>Pagu Total</label>
                            </div> --}}
                            {{-- <div class="form-group">
                                <label></label>
                                <select class="form-control select2" style="width:100%" name="jenis_revisi">
                                    <option value="">- Pilih Jenis Revisi -</option>
                                    <option value="RPD Triwulan">RPD Triwulan</option>
                                    <option value="POK">POK</option>
                                    <option value="Antar Satker">Antar Satker</option>
                                    <option value="Es 1">Es 1</option>
                                </select>
                            </div> --}}
                                {{-- <div class="row">
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalSub"><i class="fa fa-ellipsis-v"></i></a>
                                    </div>
                                </div> --}}

                            </div>
                            {{-- <div class="col-sm-6">
                            <div class="form-group">
                                <label for=""> </label>

                            </div>
                            </div> --}}
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div class="modal fade" id="modalSub">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <!-- <h4 class="modal-title">Default Modal</h4> -->
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>No.</th>
                      <th>Kode Menu</th>
                      <th>Kode Sub Menu</th>
                      <th>Nama Sub Menu</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      {{-- @if(count($data)) --}}
                      @foreach($submenu as $key)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{@$key->menu->kode_menu}}</td>
                      <td name="kode" value="{{$key->kode_submenu}}">{{@$key->kode_submenu}}</td>
                      <td>{{@$key->nama_submenu}}</td>
                      <td>
                          <a class="btn btn-primary btn-sm" href="{{route('submenu.modal', ['id' => $key->id])}}">
                              <i class="fas fa-plus">
                              </i>
                            </a>
                      </td>
                    </tr>
                    @endforeach
                    {{-- @else --}}

                    {{-- @endif --}}
                    </tbody>
                  </table>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div class="modal fade" id="modal-sub2">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <!-- <h4 class="modal-title">Default Modal</h4> -->
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form-modal-child" action="#" method="POST">
                @csrf
            <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                          <!-- text input -->
                          <div class="form-group">
                            <label>KRO</label>
                            <select class="form-control select2" style="width: 100%;" name="category_id">
                                <option value="">- Pilih KRO -</option>
                                @foreach($category as $categoryid)
                                    <option value="{{$categoryid->id}}">{{$categoryid->kode_kategori}} - {{$categoryid->nama_kategori}}</option>
                                @endforeach
                            </select>
                            </div>
                          {{-- <div class="form-group">
                            <label>Sub Kategori</label>
                            <div class="row">
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Enter ...">
                                </div>
                                <div class="col-sm-4">
                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalSub2"><i class="fa fa-ellipsis-v"></i></a>
                                </div>
                            </div>

                          </div> --}}
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for=""> </label>

                          </div>
                        </div>
                      </div>
            </div>
                <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div class="modal fade" id="modalSub2">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <!-- <h4 class="modal-title">Default Modal</h4> -->
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>No.</th>
                      <th>Kode Kategori</th>
                      <th>Nama kategori</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      {{-- @if(count($data)) --}}
                      @foreach($category as $key)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{@$key->kode_kategori}}</td>
                      <td>{{@$key->nama_kategori}}</td>
                      <td>
                          <a class="btn btn-primary btn-sm" href="{{route('kategori.modal', ['id' => $key->id])}}">
                              <i class="fas fa-plus">
                              </i>
                            </a>
                      </td>
                    </tr>
                    @endforeach
                    {{-- @else --}}

                    {{-- @endif --}}
                    </tbody>
                  </table>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      @include('master.modal_realisasi.sub-kategori')
      @include('master.modal_realisasi.kegiatan')
      @include('master.modal_realisasi.sub_kegiatan')
      @include('master.modal_realisasi.rincian')
      @include('master.modal_realisasi.editreal')

      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

@section('scripts-bottom')

<script>
    $(document).ready(function() {

        $(document).ready(function () {
          $('.select2').select2();
          //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
      });

        $('.btn-key').on('click', function() {
            id = $(this).data('id');
            urlKey = window.location.origin + '/submenureal/' + id;

            $('#form-modal-key').attr('action', urlKey);
        });
        $('.btn-child').on('click', function() {
            id = $(this).data('id');
            urlChild = window.location.origin + '/catreal/' + id;
            console.log(urlChild)

            $('#form-modal-child').attr('action', urlChild);
        });
        $('.btn-gchild').on('click', function() {
            id = $(this).data('id');
            urlGchild = window.location.origin + '/subcatreal/' + id;

            $('#form-modal-gchild').attr('action', urlGchild);
        });
        $('.btn-ggchild').on('click', function() {
            id = $(this).data('id');
            urlGgchild = window.location.origin + '/kegreal/' + id;

            $('#form-modal-ggchild').attr('action', urlGgchild);
        });
        $('.btn-zchild').on('click', function() {
            id = $(this).data('id');
            urlZchild = window.location.origin + '/subkegreal/' + id;

            $('#form-modal-zchild').attr('action', urlZchild);
        });

        $('.btn-zzchild').on('click', function() {
            id = $(this).data('id');
            urlZzchild = window.location.origin + '/rincianreal/' + id;

            $('#form-modal-zzchild').attr('action', urlZzchild);
        });



        $('.btn-renc').on('click', function() {
            id = $(this).data('id');
            uraian = $(this).data('uraian');
            pagu = $(this).data('pagu');
            jan = $(this).data('jan');
            feb = $(this).data('feb');
            mar = $(this).data('mar');
            apr = $(this).data('apr');
            mei = $(this).data('mei');
            jun = $(this).data('jun');
            jul = $(this).data('jul');
            agt = $(this).data('agt');
            sep = $(this).data('sep');
            okt = $(this).data('okt');
            nov = $(this).data('nov');
            des = $(this).data('des');
            urlRenc = window.location.origin + '/penarikan/' + id;
            console.log(urlRenc)
            console.log(id)
            console.log(jan)
            console.log(feb)
            $('#form-modal-renc').attr('action', urlRenc);
            $('#uraian').attr('value',uraian);
            $('#pagu').attr('value', pagu);
            $('#jan').attr('value', jan);
            $('#feb').attr('value', feb);
            $('#mar').attr('value', mar);
            $('#apr').attr('value', apr);
            $('#mei').attr('value', mei);
            $('#jun').attr('value', jun);
            $('#jul').attr('value', jul);
            $('#agt').attr('value', agt);
            $('#sep').attr('value', sep);
            $('#okt').attr('value', okt);
            $('#nov').attr('value', nov);
            $('#des').attr('value', des);
        })
    })

    $('.btn-edit').on('click', function(){
      id = $(this).data('id');
      jumlah = $(this).data('jumlah');
      tgl = $(this).data('tgl');
      penerima = $(this).data('penerima');
      parent = $(this).data('parent');
      ket = $(this).data('ket');
      console.log(id);

      urlEdit = window.location.origin + '/editrealisasi/' + id;

      $('#form-modal-edit').attr('action', urlEdit);
      $('#tgl-kuitansi').attr('value', tgl);
      $('#jumlah').attr('value', jumlah);
      $('#penerima').attr('value', penerima);
      $('#ket').attr('value', ket);
    })
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "ordering": false,"autoWidth": false, "paging":false,
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
