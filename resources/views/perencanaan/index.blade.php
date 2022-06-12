@extends('layouts.master')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Perencanaan</h1>
        </div><!-- /.col -->

      </div><!-- /.row -->
      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-left">
            <a href="{{route('perencanaan.create')}}"> <button type="button" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Input Perencanaan</button></a>
          </ol>
        </div><!-- /.col -->
        <!--@if($data->count())-->
        <!--<div class="col-sm-6">-->
        <!--  <ol class="breadcrumb float-sm-right">-->
        <!--    <a class="btn-simpan" href="#" data-toggle="modal" data-target="#modal-simpan"> <button type="button" class="btn btn-danger btn-block"><i class="fa fa-plus"></i> Revisi</button></a>-->
        <!--  </ol>-->
        <!--</div><!-- /.col -->-->
        @endif
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
                        <form action="{{route('filterperencana')}}" method="get">
                            <!-- @csrf -->
                            <div class="form-group">
                            <select class="form-control select2" style="width:100%" name="tanggal_revisi">
                                  <option value="">- Pilih Tanggal -</option>
                                  @foreach($tanggal as $mo)
                                        <option value="{{$mo->tanggal_revisi}}">{{$mo->tanggal_revisi}}</option>
                                    @endforeach
                              </select>
                            </div>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary btn-md">Filter</button>
                            </div>
                        </form>
                    </div>
                    @if($cektgl == null)
                      Perencanaan tanggal : <strong>{{$last->tanggal_revisi}}</strong>
                      @else
                      Perencanaan tanggal : <strong>{{$cektgl}}</strong>
                      @endif
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Uraian</th>
                    <th>Jumlah Pagu</th>
                    <!-- <th>Sisa Pagu</th> -->
                    <th>Proses</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach($data as $key)
                        <tr style="background-color:yellow">
                            <td>{{@$key->menu->kode_menu}}</td>
                            <td><a class="btn-key" data-id="{{$key->id}}" href="#" data-toggle="modal" data-target="#modal-default">{{@$key->menu->nama_menu}}</a></td>
                            <td>{{number_format(@$key->pagu_total,0,",",".")}}</td>
                            <!-- <td>{{number_format(@$key->sisa_pagu,0,",",".")}}</td> -->
                            <td>
                              <a class="btn btn-success btn-sm btn-total"  type="submit" href="{{route('totaldetil',['id' => $key->id])}}">
                                            <i class="fas fa-plus">
                                            </i>
                                            Total
                                         </a>
                                <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapusdata',['id' => $key->id])}}">
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
                            <td>{{number_format(@$child->pagu_total,0,",",".")}}</td>
                            <!-- <td>{{number_format(@$child->sisa_pagu,0,",",".")}}</td> -->
                            <td>
                              <a class="btn btn-success btn-sm btn-total"  type="submit" href="{{route('totaldetil',['id' => $child->id])}}">
                                            <i class="fas fa-plus">
                                            </i>
                                            Total
                                         </a>
                                <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapusdata',['id' => $child->id])}}">
                                    <i class="fas fa-trash">
                                    </i>
                                </a>
                            </td>
                        </tr>
                        @if($child->children->count())
                        @foreach($child->children as $gchild)
                            <tr style="background-color: rgb(139, 221, 107)">
                                <td>{{@$gchild->category->kode_kategori}}</td>
                                <td>
                                    <a class="btn-gchild" href="#" data-toggle="modal" data-target="#modal-subcat" data-id="{{$gchild->id}}" data-name="">{{@$gchild->category->nama_kategori}}</a>
                                </td>
                                <td>{{number_format(@$gchild->pagu_total,0,",",".")}}</td>
                                <!-- <td>{{number_format(@$gchild->sisa_pagu,0,",",".")}}</td> -->
                                <td>
                                  <a class="btn btn-success btn-sm btn-total"  type="submit" href="{{route('totaldetil',['id' => $gchild->id])}}">
                                            <i class="fas fa-plus">
                                            </i>
                                            Total
                                         </a>
                                    <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapusdata',['id' => $gchild->id])}}">
                                        <i class="fas fa-trash">
                                        </i>
                                    </a>
                                </td>
                            </tr>
                            @if($gchild->children->count())
                            {{-- {{dd($gchild->children)}} --}}
                            @foreach($gchild->children as $ggchild)
                                <tr style="background-color: rgb(255, 106, 106)">
                                    <td>{{@$ggchild->subcat->kode_subcat}}</td>
                                    <td>
                                        <a class="btn-ggchild" href="#" data-toggle="modal" data-target="#modal-kegiatan" data-id="{{$ggchild->id}}">{{@$ggchild->subcat->nama_subcat}}</a>
                                    </td>
                                    <td>{{number_format(@$ggchild->pagu_total,0,",",".")}}</td>
                                    <!-- <td>{{number_format(@$ggchild->sisa_pagu,0,",",".")}}</td> -->
                                    <td>
                                      <a class="btn btn-success btn-sm btn-total"  type="submit" href="{{route('totaldetil',['id' => $ggchild->id])}}">
                                            <i class="fas fa-plus">
                                            </i>
                                            Total
                                         </a>
                                        <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapusdata',['id' => $ggchild->id])}}">
                                            <i class="fas fa-trash">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                @if($ggchild->children->count())
                                @foreach($ggchild->children as $zchild)
                                    <tr style="background-color: rgb(224, 224, 143)">
                                        <td>{{@$zchild->kegiatan->kode_kegiatan}}</td>
                                        <td>
                                            <a class="btn-zchild" href="#" data-toggle="modal" data-target="#modal-sub_kegiatan" data-id="{{$zchild->id}}" data-name="">{{@$zchild->kegiatan->nama_kegiatan}}</a>
                                        </td>
                                        <td>{{number_format(@$zchild->pagu_total, 0,",",".")}}</td>
                                        <!-- <td>{{number_format(@$zchild->sisa_pagu, 0,",",".")}}</td> -->
                                        <td>
                                          <a class="btn btn-success btn-sm btn-total"  type="submit" href="{{route('totaldetil',['id' => $zchild->id])}}">
                                            <i class="fas fa-plus">
                                            </i>
                                            Total
                                         </a>
                                            <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapusdata',['id' => $zchild->id])}}">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    @if($zchild->children->count())
                                    @foreach($zchild->children as $zzchild)
                                    <tr>
                                        <td>{{@$zzchild->sub_kegiatan->kode_sub_kegiatan}}</td>
                                        <td>
                                            <a class="btn-zzchild" href="#" data-toggle="modal" data-target="#modal-rincian" data-id="{{$zzchild->id}}" data-name="">{{@$zzchild->sub_kegiatan->nama_sub_kegiatan}}</a>
                                        </td>
                                        <td>{{number_format(@$zzchild->pagu_total, 0,",",".")}}</td>
                                        <!-- <td>{{number_format(@$zzchild->sisa_pagu, 0,",",".")}}</td> -->
                                        <td>
                                          <a class="btn btn-success btn-sm btn-total"  type="submit" href="{{route('totaldetil',['id' => $zzchild->id])}}">
                                            <i class="fas fa-plus">
                                            </i>
                                            Total
                                         </a>
                                            <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapusdata',['id' => $zzchild->id])}}">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                        @if($zzchild->children->count())
                                        @foreach($zzchild->children as $achild)
                                        <tr>
                                            <td>{{@$achild->kode}}</td>
                                            <td>{{@$achild->rincian->nama_rincian}}
                                            </td>
                                            <td>{{number_format(@$achild->pagu_total, 0,",",".")}}</td>
                                            <!-- <td>{{number_format($achild->sisa_pagu, 0,",",".")}}</td> -->
                                            <td>
                                                <a class="btn btn-primary btn-sm btn-renc" href="#" data-toggle="modal" data-target="#modal-renc"data-id="{{$achild->id}}" data-uraian="{{$achild->rincian->nama_rincian}}" data-pagu="{{$achild->pagu_total}}" data-sisa="{{$achild->sisa_pagu}}"
                                                    data-jan="{{$achild->pagu_jan}}" data-feb="{{$achild->pagu_feb}}" data-mar="{{$achild->pagu_mar}}" data-apr="{{$achild->pagu_apr}}" data-mei="{{$achild->pagu_mei}}" data-jun="{{$achild->pagu_jun}}" data-jul="{{$achild->pagu_jul}}" data-agt="{{$achild->pagu_agt}}" data-sep="{{$achild->pagu_sep}}" data-okt="{{$achild->pagu_okt}}" data-nov="{{$achild->pagu_nov}}" data-des="{{$achild->pagu_des}}">
                                                    Renc Penarikan
                                                </a>

                                                <a class="btn btn-outline-primary btn-sm btn-rev" href="#" data-toggle="modal" data-target="#modal-rev" data-parent="{{$achild->parent_id}}" data-tglrev="{{$achild->tanggal_revisi}}" data-id="{{$achild->id}}" data-uraian="{{$achild->rincian->nama_rincian}}" data-pagu="{{$achild->pagu_total}}" data-sisa="{{$achild->sisa_pagu}}"
                                                    data-jan="{{$achild->pagu_jan}}" data-feb="{{$achild->pagu_feb}}" data-mar="{{$achild->pagu_mar}}" data-apr="{{$achild->pagu_apr}}" data-mei="{{$achild->pagu_mei}}" data-jun="{{$achild->pagu_jun}}" data-jul="{{$achild->pagu_jul}}" data-agt="{{$achild->pagu_agt}}" data-sep="{{$achild->pagu_sep}}" data-okt="{{$achild->pagu_okt}}" data-nov="{{$achild->pagu_nov}}" data-des="{{$achild->pagu_des}}">
                                                    Revisi
                                                </a>

                                                <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapusdata',['id' => $achild->id])}}">
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
                                <label>Jenis KRO</label>
                                <select class="form-control select2" style="width: 100%;" name="submenu_id">
                                    <option value="">- Pilih KRO -</option>
                                    @foreach($submenu as $submenuid)
                                        <option value="{{$submenuid->id}}">{{$submenuid->kode_submenu}} - {{$submenuid->nama_submenu}}</option>
                                    @endforeach
                                </select>
                            </div>

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
                <table id="example2" class="table table-bordered table-hover">
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
                            <label>Pilih RO</label>
                            <select class="form-control select2" style="width: 100%;" name="category_id">
                                <option value="">- Pilih RO -</option>
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

      @include('master.modal.sub-kategori')
      @include('master.modal.kegiatan')
      @include('master.modal.sub_kegiatan')
      @include('master.modal.rincian')
      @include('master.modal.penarikan')
      @include('master.modal.revisi')
      @include('master.modal.modal-simpan')

      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

@section('scripts-bottom')

<script type="text/javascript">

    function formatNumber(angka) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].lengt % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return rupiah;
    }
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

            urlKey = window.location.origin + '/submenuplan/' + id;

            $('#form-modal-key').attr('action', urlKey);
            $('select[name="submenu_id"]').on('change', function(){
                submenuId = $(this).val();
                console.log(submenuId)
                if(submenuId) {
                    $.ajax({
                        url: ""
                    })
                }
            })
        });
        $('.btn-child').on('click', function() {
            id = $(this).data('id');
            urlChild = window.location.origin + '/catplan/' + id;
            console.log(urlChild)

            $('#form-modal-child').attr('action', urlChild);
        });
        $('.btn-gchild').on('click', function() {
            id = $(this).data('id');
            urlGchild = window.location.origin + '/subcatplan/' + id;

            $('#form-modal-gchild').attr('action', urlGchild);
        });
        $('.btn-ggchild').on('click', function() {
            id = $(this).data('id');
            urlGgchild = window.location.origin + '/kegplan/' + id;

            $('#form-modal-ggchild').attr('action', urlGgchild);
        });
        $('.btn-zchild').on('click', function() {
            id = $(this).data('id');
            urlZchild = window.location.origin + '/subkegplan/' + id;

            $('#form-modal-zchild').attr('action', urlZchild);
        });

        $('.btn-zzchild').on('click', function() {
            id = $(this).data('id');
            // console.log(id)
            urlZzchild = window.location.origin + '/rincianplan/' + id;

            $('#form-modal-zzchild').attr('action', urlZzchild);
            $('#pagutot').attr('value', id);
        });



        // $('#example2 #aa').each(function() {
        //     a =  $(this).val();
        //     console.log(a)

        // })


        $('.btn-renc').on('click', function() {
            formatter = new Intl.NumberFormat('id');

            id = $(this).data('id');
            parent = $(this).data('parent');
            uraian = $(this).data('uraian');
            pagu = $(this).data('pagu');
            sisa = $(this).data('sisa');
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
            $('#form-modal-renc').attr('action', urlRenc);
            $('#uraian').attr('value',uraian);
            $('#parent').attr('value',parent);
            $('#pagu').attr('value', pagu);
            $('#sisa').attr('value', sisa);
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


        $('.calc').on('input', '.mont', function() {
            calculated_total = 0;
            sisa =  0;
            tot = $('#pagu').val();
            console.log(tot)

            $('.calc .mont').each(function() {
                get_textbox_value = $(this).val();
                // console.log(get_textbox_value)
                if($.isNumeric(get_textbox_value)){
                    calculated_total += parseFloat(get_textbox_value);
                }
                // console.log(calculated_total)
            });

            if(calculated_total > tot){
                // sisa = sisa - calculated_total
                $('#simpan').attr('disabled', true)
                alert('Sisa tidak boleh minus');
            } else {
                $('#simpan').attr('disabled', false)
            }

            sisa = tot - calculated_total;
            $('#sisa').attr('value', sisa);
            console.log(sisa);
        })

        $('.btn-rev').on('click', function() {
          id = $(this).data('id');
          pagu = $(this).data('pagu');
          tglRev = $(this).data('tglrev');
          parent = $(this).data('parent')
          console.log(parent)

          urlRev = window.location.origin + '/revisi/' + id;

          $('#form-modal-rev').attr('action', urlRev);
          $('#parent').attr('value',parent)
          $('#tglrev').attr('value', tglRev);
          $('#paguu').attr('value', pagu);
          
          

        })

        $('.btn-hapus').on('click', function() {
            id = $(this).data('id');
            url = $(this).data('url');
            // $('#hapus').attr('href', url);
        })
        // $('.btn-total').on('click', function() {
        //     id = $(this).data('id');
        //     url = $(this).data('url');
        //     // $('#hapus').attr('href', url);
        //     // console.log(id);
        // })

        $('.btn-simpan').on('click', function() {
            id = $(this).data('id');
            urlRev = window.location.origin + '/simpanrencana/';

            $('#form-modal-simpan').attr('action', urlRev);
            // $('#hapus').attr('href', url);
        })
    })

    $('.calc').on('input', '.mont', function(){
      // getValue=$(this).val();
      // console.log(getValue)
      calculated_total = 0;
      sisa = 0;
      tot = $('#pagu').val()
      console.log(tot)

      $('.calc .mont').each(function (){
        get_textbox_value = $(this).val()
        if($.isNumeric(get_textbox_value)) {
          calculated_total += parseFloat(get_textbox_value)
        }
      })
      if(calculated_total > tot){
        alert('pagu perbulan melebihi pagu total')


      }
      sisa = tot - calculated_total;
      console.log(sisa)
      $('#sisa').attr('value',sisa);
    });
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
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

    $(document).ready(function () {
      $('.btn-ggchild').on('click', function () {
        id = $(this).data('id');
      })
    })
  </script>

@endsection
