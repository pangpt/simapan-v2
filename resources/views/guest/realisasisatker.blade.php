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
        </div>
      <!-- Default box -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12 text-center">
              <h1>Menu Realisasi (309706)</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <div class="card">
          <div class="card-body">
              <div class="row">
                    <div class="col-3">
                        <form action="{{route('filterrealsatker')}}" method="GET">
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
              </div>
          </div>
      </div>

      <div class="card">
        <div class="card-body p-0">
            <table id="example2" class="table table-bordered">
                <thead>
                <tr>
                  <th>Kode</th>
                  <th>Uraian</th>
                  <th>Tanggal Kuitansi</th>
                  <th>Jumlah</th>
                  <th>Penerima Uang</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($data as $key)
                      <tr style="background-color:yellow">
                          <td>{{@$key->program_satker->kode_program}}</td>
                          <td>{{@$key->program_satker->nama_program}}</td>
                          <td>{{Carbon\Carbon::parse(@$key->tanggal_kuitansi)->format('d-m-Y')}}</td>
                          <td>{{number_format(@$key->jumlah,0,",",".")}}</td>
                          <td>{{@$key->penerima}}</td>
                          <td>{{@$key->keterangan}}</td>
                      </tr>
                      @if($key->children->count())
                      @foreach($key->children as $child)
                      <tr style="background-color: rgb(247, 238, 238)">
                          <td>{{@$child->kegiatan_satker->kode_kegiatan}}</td>
                          <td>
                                  {{@$child->kegiatan_satker->nama_kegiatan}}
                          </td>
                          <td>{{Carbon\Carbon::parse(@$child->tanggal_kuitansi)->format('d-m-Y')}}</td>
                          <td>{{number_format(@$child->jumlah,0,",",".")}}</td>
                          <td>{{@$child->penerima}}</td>
                          <td>{{@$child->keterangan}}</td>
                      </tr>
                      @if($child->children->count())
                      @foreach($child->children as $gchild)
                          <tr style="background-color: rgb(139, 221, 107)">
                              <td>{{$gchild->sub_kegiatan_satker->kode_subkegiatan}}</td>
                              <td>
                                 {{$gchild->sub_kegiatan_satker->nama_subkegiatan}}
                              </td>
                              <td>{{Carbon\Carbon::parse(@$gchild->tanggal_kuitansi)->format('d-m-Y')}}</td>
                              <td>{{number_format(@$gchild->jumlah,0,",",".")}}</td>
                              <td>{{@$gchild->penerima}}</td>
                              <td>{{@$gchild->keterangan}}</td>
                          </tr>
                          @if($gchild->children->count())
                          {{-- {{dd($gchild->children)}} --}}
                          @foreach($gchild->children as $ggchild)
                              <tr style="background-color: rgb(255, 106, 106)">
                                  <td>{{$ggchild->menu_satker->kode_menu}}</td>
                                  <td>
                                     {{$ggchild->menu_satker->nama_menu}}
                                  </td>
                                  <td>{{Carbon\Carbon::parse(@$ggchild->tanggal_kuitansi)->format('d-m-Y')}}</td>
                                  <td>{{number_format(@$ggchild->jumlah,0,",",".")}}</td>
                                  <td>{{@$ggchild->penerima}}</td>
                                  <td>{{@$ggchild->keterangan}}</td>
                              </tr>
                              @if($ggchild->children->count())
                              @foreach($ggchild->children as $zchild)
                                  <tr style="background-color: rgb(224, 224, 143)">
                                      <td>{{@$zchild->rincian_satker->kode_rincian}}</td>
                                      <td>
                                         {{$zchild->rincian_satker->nama_rincian}}
                                      </td>
                                      <td>{{Carbon\Carbon::parse(@$zchild->tanggal_kuitansi)->format('d-m-Y')}}</td>
                                      <td>{{number_format(@$zchild->jumlah,0,",",".")}}</td>
                                      <td>{{@$zchild->penerima}}</td>
                                      <td>{{@$zchild->keterangan}}</td>
                                  </tr>
                                  @if($zchild->children->count())
                                  @foreach($zchild->children as $zzchild)
                                  <tr>
                                      <td>{{@$zzchild->detil_satker->kode_detil}}</td>
                                      <td>
                                        {{@$zzchild->detil_satker->nama_detil}}
                                      </td>
                                      <td>{{Carbon\Carbon::parse(@$zzchild->tanggal_kuitansi)->format('d-m-Y')}}</td>
                                      <td>{{number_format(@$zzchild->jumlah,0,",",".")}}</td>
                                      <td>{{@$zzchild->penerima}}</td>
                                      <td>{{@$zzchild->keterangan}}</td>
                                  </td>
                                  </tr>
                                      @if($zzchild->children->count())
                                      @foreach($zzchild->children as $achild)
                                      <tr>
                                          <td>{{@$achild->uraian_satker->kode_uraian}}</td>
                                          <td>{{@$achild->uraian_satker->nama_uraian}}
                                          </td>
                                          <td>{{Carbon\Carbon::parse(@$achild->tanggal_kuitansi)->format('d-m-Y')}}</td>
                                          <td>{{number_format(@$achild->jumlah,0,",",".")}}</td>
                                          <td>{{@$achild->penerima}}</td>
                                          <td>{{@$achild->keterangan}}</td>
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

@endsection

@section('scripts-bottom')

<script>
    // $(function () {
    //   dataTable = $('#example2').DataTable({
    //     processing : true,
    //     responsive : true,
    //     serverSide : true,
    //     paging: true,
    //     lengthChange: false,
    //     searching: true,
    //     order: [],
    //     info: true,
    //     autoWidth: false,
    //     ajax : {
    //       url: "{{route('plan.index')}}",
    //       type: "GET",
    //     },

    //     columns: [
    //       {data: "kode","orderable":false},
    //       {data: "parent_id","orderable":false},
    //       {data: "children","orderable":false},
    //       {data: "uraian","orderable":false},
    //       {data: "uraian","orderable":false},
    //     ],

    //   });
    // });

    $('.filter').on('change', function(){
        bulan = $('#filter-bulan').val();
        url = window.location.origin + '/real' ;
        console.log(url)
    })
  </script>

@endsection
