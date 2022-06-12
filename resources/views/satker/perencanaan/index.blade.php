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
            <a href="{{route('perencanaansatker.create')}}"> <button type="button" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Input Perencanaan</button></a>
          </ol>
        </div><!-- /.col -->
        <!--@if($data->count())-->
        <!--<div class="col-sm-6">-->
        <!--  <ol class="breadcrumb float-sm-right">-->
        <!--    <a class="btn-simpan" href="#" data-toggle="modal" data-target="#simpan-satker"> <button type="button" class="btn btn-danger btn-block"><i class="fa fa-plus"></i> Simpan</button></a>-->
        <!--  </ol>-->
        <!--</div><!-- /.col -->-->
        <!--@endif-->
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
                        <form action="{{route('filterperencanasatker')}}" method="get">
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
                    <!-- <th>Revisi Pagu</th> -->
                    <th>Proses</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach($data as $key)
                        <tr style="background-color:yellow">
                            <td>{{@$key->program_satker->kode_program}}</td>
                            <td><a class="btn-key" data-id="{{$key->id}}" href="#" data-toggle="modal" data-target="#modal-default">{{@$key->program_satker->nama_program}}</a></td>
                            <td>{{number_format(@$key->pagu_total,0,",",".")}}</td>
                            <!-- <td>{{number_format(@$key->sisa_pagu,0,",",".")}}</td> -->
                            <td>
                                <a class="btn btn-success btn-sm btn-total"  type="submit" href="{{route('totalsatker',['id' => $key->id])}}">
                                            <i class="fas fa-plus">
                                            </i>
                                            Total
                                         </a>
                                <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapussatker',['id' => $key->id])}}">
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
                            <td>{{number_format(@$child->pagu_total,0,",",".")}}</td>
                            <!-- <td>{{number_format(@$child->sisa_pagu,0,",",".")}}</td> -->
                            <td>
                                <a class="btn btn-success btn-sm btn-total"  type="submit" href="{{route('totalsatker',['id' => $child->id])}}">
                                            <i class="fas fa-plus">
                                            </i>
                                            Total
                                         </a>
                                <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapussatker',['id' => $child->id])}}">
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
                                <td>{{number_format(@$gchild->pagu_total,0,",",".")}}</td>
                                <!-- <td>{{number_format(@$gchild->sisa_pagu,0,",",".")}}</td> -->
                                <td>
                                    <a class="btn btn-success btn-sm btn-total"  type="submit" href="{{route('totalsatker',['id' => $gchild->id])}}">
                                            <i class="fas fa-plus">
                                            </i>
                                            Total
                                         </a>
                                    <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapussatker',['id' => $gchild->id])}}">
                                        <i class="fas fa-trash">
                                        </i>
                                    </a>
                                </td>
                            </tr>
                            @if($gchild->children->count())
                            @foreach($gchild->children as $ggchild)
                                <tr style="background-color: rgb(255, 106, 106)">
                                    <td>{{@$ggchild->menu_satker->kode_menu}}</td>
                                    <td>
                                        <a class="btn-ggchild" href="#" data-toggle="modal" data-target="#modal-rincian" data-id="{{$ggchild->id}}">{{@$ggchild->menu_satker->nama_menu}}</a>
                                    </td>
                                    <td>{{number_format(@$ggchild->pagu_total,0,",",".")}}</td>
                                    <!-- <td>{{number_format(@$ggchild->sisa_pagu,0,",",".")}}</td> -->
                                    <td>
                                        <a class="btn btn-success btn-sm btn-total"  type="submit" href="{{route('totalsatker',['id' => $ggchild->id])}}">
                                            <i class="fas fa-plus">
                                            </i>
                                            Total
                                         </a>
                                        <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapussatker',['id' => $ggchild->id])}}">
                                            <i class="fas fa-trash">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                @if($ggchild->children->count())
                                @foreach($ggchild->children as $zchild)
                                    <tr style="background-color: rgb(224, 224, 143)">
                                        <td>{{@$zchild->rincian_satker->kode_rincian}}</td>
                                        <td>
                                            <a class="btn-zchild" href="#" data-toggle="modal" data-target="#modal-detil" data-id="{{$zchild->id}}" data-name="">{{@$zchild->rincian_satker->nama_rincian}}</a>
                                        </td>
                                        <td>{{number_format(@$zchild->pagu_total, 0,",",".")}}</td>
                                        <!-- <td>{{number_format(@$zchild->sisa_pagu, 0,",",".")}}</td> -->
                                        <td>
                                            <a class="btn btn-success btn-sm btn-total"  type="submit" href="{{route('totalsatker',['id' => $zchild->id])}}">
                                            <i class="fas fa-plus">
                                            </i>
                                            Total
                                         </a>
                                            <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapussatker',['id' => $zchild->id])}}">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    @if($zchild->children->count())
                                    @foreach($zchild->children as $zzchild)
                                    <tr>
                                        <td>{{@$zzchild->detil_satker->kode_detil}}</td>
                                        <td>
                                            <a class="btn-zzchild" href="#" data-toggle="modal" data-target="#modal-uraian" data-id="{{$zzchild->id}}" data-name="">{{@$zzchild->detil_satker->nama_detil}}</a>
                                        </td>
                                        <td>{{number_format(@$zzchild->pagu_total, 0,",",".")}}</td>
                                        <!-- <td>{{number_format(@$zzchild->sisa_pagu, 0,",",".")}}</td> -->
                                        <td>
                                            <a class="btn btn-success btn-sm btn-total"  type="submit" href="{{route('totalsatker',['id' => $zzchild->id])}}">
                                            <i class="fas fa-plus">
                                            </i>
                                            Total
                                         </a>
                                            <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapussatker',['id' => $zzchild->id])}}">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                        @if($zzchild->children->count())
                                        @foreach($zzchild->children as $achild)
                                        <tr>
                                            <td>{{@$achild->uraian_satker->kode_uraian}}</td>
                                            <td>{{@$achild->uraian_satker->nama_uraian}}
                                            </td>
                                            <td>{{number_format($achild->pagu_total, 0,",",".")}}</td>
                                            <!-- <td>{{number_format($achild->sisa_pagu, 0,",",".")}}</td> -->
                                            <td>
                                                <a class="btn btn-primary btn-sm btn-renc" href="#" data-toggle="modal" data-target="#modal-renc"data-id="{{$achild->id}}" data-uraian="{{$achild->uraian}}" data-pagu="{{$achild->pagu_total}}" data-sisa="{{$achild->sisa_pagu}}"
                                                    data-jan="{{$achild->pagu_jan}}" data-feb="{{$achild->pagu_feb}}" data-mar="{{$achild->pagu_mar}}" data-apr="{{$achild->pagu_apr}}" data-mei="{{$achild->pagu_mei}}" data-jun="{{$achild->pagu_jun}}" data-jul="{{$achild->pagu_jul}}" data-agt="{{$achild->pagu_agt}}" data-sep="{{$achild->pagu_sep}}" data-okt="{{$achild->pagu_okt}}" data-nov="{{$achild->pagu_nov}}" data-des="{{$achild->pagu_des}}">
                                                    Renc Penarikan
                                                </a>
                                                 <!--@if($achild->status == 1)-->
                                                <a class="btn btn-outline-primary btn-sm btn-rev" href="#" data-toggle="modal" data-target="#modal-rev" data-parent="{{$achild->parent_id}}" data-tglrev="{{$achild->tanggal_revisi}}" data-id="{{$achild->id}}" data-pagu="{{$achild->pagu_total}}" data-sisa="{{$achild->sisa_pagu}}"
                                                    data-jan="{{$achild->pagu_jan}}" data-feb="{{$achild->pagu_feb}}" data-mar="{{$achild->pagu_mar}}" data-apr="{{$achild->pagu_apr}}" data-mei="{{$achild->pagu_mei}}" data-jun="{{$achild->pagu_jun}}" data-jul="{{$achild->pagu_jul}}" data-agt="{{$achild->pagu_agt}}" data-sep="{{$achild->pagu_sep}}" data-okt="{{$achild->pagu_okt}}" data-nov="{{$achild->pagu_nov}}" data-des="{{$achild->pagu_des}}">
                                                    Revisi
                                                </a>
                                                <!--@endif-->
                                                <a class="btn btn-danger btn-sm btn-hapus"  type="submit" href="{{route('hapussatker',['id' => $achild->id])}}">
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
      @include('satker.modal.modal-program')
      @include('satker.modal.modal-kegiatan')
      @include('satker.modal.modal-subkegiatan')
      @include('satker.modal.modal-menu')
      @include('satker.modal.modal-rincian')
      @include('satker.modal.modal-detil')
      @include('satker.modal.modal-penarikan')
      @include('satker.modal.modal-revisi')
      @include('satker.modal.modal-simpan')


      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

@section('scripts-bottom')

<script>

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
            urlKey = window.location.origin + '/satker/kegiatanplan/' + id;

            $('#form-modal-key').attr('action', urlKey);
        });
        $('.btn-child').on('click', function() {
            id = $(this).data('id');
            urlChild = window.location.origin + '/satker/subplan/' + id;
            console.log(urlChild)

            $('#form-modal-child').attr('action', urlChild);
        });
        $('.btn-gchild').on('click', function() {
            id = $(this).data('id');
            urlGchild = window.location.origin + '/satker/menu/' + id;

            $('#form-modal-gchild').attr('action', urlGchild);
        });
        $('.btn-ggchild').on('click', function() {
            id = $(this).data('id');
            urlGgchild = window.location.origin + '/satker/rincian/' + id;

            $('#form-modal-ggchild').attr('action', urlGgchild);
        });
        $('.btn-zchild').on('click', function() {
            id = $(this).data('id');
            urlZchild = window.location.origin + '/satker/detil/' + id;

            $('#form-modal-zchild').attr('action', urlZchild);
        });

        $('.btn-zzchild').on('click', function() {
            id = $(this).data('id');
            // console.log(id)
            urlZzchild = window.location.origin + '/satker/uraian/' + id;

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

            urlRenc = window.location.origin + '/satker/penarikansatker/' + id;

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

          urlRev = window.location.origin + '/satker/revisisatker/' + id;

          $('#form-modal-rev').attr('action', urlRev);
          $('#parent').attr('value',parent)
          $('#tglrev').attr('value', tglRev);
          $('#paguu').attr('value', pagu);
          
          

        })

        $('.btn-total').on('click', function() {
            id = $(this).data('id');
            url = $(this).data('url');
            // $('#hapus').attr('href', url);
            // console.log(id);
        })

        $('.btn-hapus').on('click', function() {
            id = $(this).data('id');
            url = $(this).data('url');
            console.log(url)
            // $('#hapus').attr('href', url);
        })

        $('.btn-simpan').on('click', function() {
            id = $(this).data('id');
            urlRev = window.location.origin + '/satker/simpansatker';

            $('#form-modal-simpan').attr('action', urlRev);
            // $('#hapus').attr('href', url);
        })
    })
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
  </script>

@endsection
