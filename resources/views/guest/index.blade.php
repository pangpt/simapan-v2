@extends('layouts.guest')

@section('content')

      <div class="row justify-content-center">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner text-center">
                <h3>PERENCANAAN</h3>
              </div>
              <a href="{{route('home.perencanaan')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner text-center">
                <h3>REALISASI</h3>
              </div>
              <a href="{{route('home.realisasi')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner text-center">
                <h3>SISA PAGU</h3>
              </div>
              <a href="{{route('sisapagu.page')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner text-center">
                <h3>DEVIASI HAL III</h3>
              </div>
              <a href="{{route('deviasi.page')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner text-center">
                <h3>SIMULASI RKK</h3>
              </div>
              <a href="{{route('simulasi.page')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      <!-- Default box -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12 text-center">
              <h1><strong> Menu Perencanaan (307509)</strong></h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <div class="card">
          <div class="card-body">
              <div class="row">
                    <div class="col-3">
                        <form action="{{route('filter')}}" method="get">
                            <!-- @csrf -->
                            <div class="form-group filter">
                                <div class="input-group date">
                                    <input type="date" class="form-control" name="tanggal_revisi" id="filter-tanggal"/>
                                </div>
                            </div>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary btn-md">Filter</button>
                            </div>
                        </form>
                    </div>
              <div class="row">
                <div class="col-3">
                      <form action="{{route('perencanaan.cetak')}}" method="get" target="_blank">
                        <input type="hidden" name="tanggal_revisi" value="{{Request::get('tanggal_revisi')}}">
                        <button class="btn btn-outline-primary btn-lg">Cetak</button>
                      </form>
                    </div>
              </div>
                   
          </div>
      </div>

      <div class="card">
        <div class="card-body p-0">
          <table id="example2" class="table table-striped projects">
              <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Uraian</th>
                    <th>Pagu Total</th>
                    <!-- <th>Sisa Pagu</th> -->
                    @foreach($month as $mo)
                    <th>{{$mo->name}}</th>
                    @endforeach
                  </tr>
                  </thead>
                  <tbody>
                      @foreach($data as $key)
                        <tr style="background-color:yellow">
                            <td>{{@$key->menu->kode_menu}}</td>
                            <td>{{@$key->menu->nama_menu}}</td>
                            <td>{{number_format(@$key->pagu_total,0,",",".")}}</td>
                            <!-- <td>{{number_format(@$key->sisa_pagu,0,",",".")}}</td> -->
                            <td>{{number_format(@$key->pagu_jan,0,",",".")}}</td>
                                            <td>{{number_format($key->pagu_feb,0,",",".")}}</td>
                                            <td>{{number_format($key->pagu_mar,0,",",".")}}</td>
                                            <td>{{number_format($key->pagu_apr,0,",",".")}}</td>
                                            <td>{{number_format($key->pagu_mei,0,",",".")}}</td>
                                            <td>{{number_format($key->pagu_jun,0,",",".")}}</td>
                                            <td>{{number_format($key->pagu_jul,0,",",".")}}</td>
                                            <td>{{number_format($key->pagu_agt,0,",",".")}}</td>
                                            <td>{{number_format($key->pagu_sep,0,",",".")}}</td>
                                            <td>{{number_format($key->pagu_okt,0,",",".")}}</td>
                                            <td>{{number_format($key->pagu_nov,0,",",".")}}</td>
                                            <td>{{number_format($key->pagu_des,0,",",".")}}</td>
                        </tr>
                        @if($key->children->count())
                        @foreach($key->children as $child)
                        <tr style="background-color: rgb(247, 238, 238)">
                            <td>{{@$child->submenu->kode_submenu}}</td>
                            <td>
                                  {{@$child->submenu->nama_submenu}}
                            </td>
                            <td>{{number_format(@$child->pagu_total,0,",",".")}}</td>
                            <!-- <td>{{number_format(@$child->sisa_pagu,0,",",".")}}</td> -->
                            <td>{{number_format(@$child->pagu_jan,0,",",".")}}</td>
                                            <td>{{number_format($child->pagu_feb,0,",",".")}}</td>
                                            <td>{{number_format($child->pagu_mar,0,",",".")}}</td>
                                            <td>{{number_format($child->pagu_apr,0,",",".")}}</td>
                                            <td>{{number_format($child->pagu_mei,0,",",".")}}</td>
                                            <td>{{number_format($child->pagu_jun,0,",",".")}}</td>
                                            <td>{{number_format($child->pagu_jul,0,",",".")}}</td>
                                            <td>{{number_format($child->pagu_agt,0,",",".")}}</td>
                                            <td>{{number_format($child->pagu_sep,0,",",".")}}</td>
                                            <td>{{number_format($child->pagu_okt,0,",",".")}}</td>
                                            <td>{{number_format($child->pagu_nov,0,",",".")}}</td>
                                            <td>{{number_format($child->pagu_des,0,",",".")}}</td>
                        </tr>
                        @if($child->children->count())
                        @foreach($child->children as $gchild)
                            <tr style="background-color: rgb(139, 221, 107)">
                                <td>{{$gchild->category->kode_kategori}}</td>
                                <td>
                                    {{$gchild->category->nama_kategori}}
                                </td>
                                <td>{{number_format(@$gchild->pagu_total,0,",",".")}}</td>
                                <!-- <td>{{number_format(@$gchild->sisa_pagu,0,",",".")}}</td> -->
                                <td>{{number_format(@$gchild->pagu_jan,0,",",".")}}</td>
                                            <td>{{number_format($gchild->pagu_feb,0,",",".")}}</td>
                                            <td>{{number_format($gchild->pagu_mar,0,",",".")}}</td>
                                            <td>{{number_format($gchild->pagu_apr,0,",",".")}}</td>
                                            <td>{{number_format($gchild->pagu_mei,0,",",".")}}</td>
                                            <td>{{number_format($gchild->pagu_jun,0,",",".")}}</td>
                                            <td>{{number_format($gchild->pagu_jul,0,",",".")}}</td>
                                            <td>{{number_format($gchild->pagu_agt,0,",",".")}}</td>
                                            <td>{{number_format($gchild->pagu_sep,0,",",".")}}</td>
                                            <td>{{number_format($gchild->pagu_okt,0,",",".")}}</td>
                                            <td>{{number_format($gchild->pagu_nov,0,",",".")}}</td>
                                            <td>{{number_format($gchild->pagu_des,0,",",".")}}</td>
                            </tr>
                            @if($gchild->children->count())
                            {{-- {{dd($gchild->children)}} --}}
                            @foreach($gchild->children as $ggchild)
                                <tr style="background-color: rgb(255, 106, 106)">
                                    <td>{{$ggchild->subcat->kode_subcat}}</td>
                                    <td>
                                        {{$ggchild->subcat->nama_subcat}}
                                    </td>
                                    <td>{{number_format(@$ggchild->pagu_total,0,",",".")}}</td>
                                    <!-- <td>{{number_format(@$ggchild->sisa_pagu,0,",",".")}}</td> -->
                                    <td>{{number_format(@$ggchild->pagu_jan,0,",",".")}}</td>
                                            <td>{{number_format($ggchild->pagu_feb,0,",",".")}}</td>
                                            <td>{{number_format($ggchild->pagu_mar,0,",",".")}}</td>
                                            <td>{{number_format($ggchild->pagu_apr,0,",",".")}}</td>
                                            <td>{{number_format($ggchild->pagu_mei,0,",",".")}}</td>
                                            <td>{{number_format($ggchild->pagu_jun,0,",",".")}}</td>
                                            <td>{{number_format($ggchild->pagu_jul,0,",",".")}}</td>
                                            <td>{{number_format($ggchild->pagu_agt,0,",",".")}}</td>
                                            <td>{{number_format($ggchild->pagu_sep,0,",",".")}}</td>
                                            <td>{{number_format($ggchild->pagu_okt,0,",",".")}}</td>
                                            <td>{{number_format($ggchild->pagu_nov,0,",",".")}}</td>
                                            <td>{{number_format($ggchild->pagu_des,0,",",".")}}</td>
                                </tr>
                                @if($ggchild->children->count())
                                @foreach($ggchild->children as $zchild)
                                    <tr style="background-color: rgb(224, 224, 143)">
                                        <td>{{$zchild->kegiatan->kode_kegiatan}}</td>
                                        <td>
                                           {{$zchild->kegiatan->nama_kegiatan}}
                                        </td>
                                        <td>{{number_format(@$zchild->pagu_total,0,",",".")}}</td>
                                        <!-- <td>{{number_format(@$zchild->sisa_pagu,0,",",".")}}</td> -->
                                        <td>{{number_format(@$zchild->pagu_jan,0,",",".")}}</td>
                                            <td>{{number_format($zchild->pagu_feb,0,",",".")}}</td>
                                            <td>{{number_format($zchild->pagu_mar,0,",",".")}}</td>
                                            <td>{{number_format($zchild->pagu_apr,0,",",".")}}</td>
                                            <td>{{number_format($zchild->pagu_mei,0,",",".")}}</td>
                                            <td>{{number_format($zchild->pagu_jun,0,",",".")}}</td>
                                            <td>{{number_format($zchild->pagu_jul,0,",",".")}}</td>
                                            <td>{{number_format($zchild->pagu_agt,0,",",".")}}</td>
                                            <td>{{number_format($zchild->pagu_sep,0,",",".")}}</td>
                                            <td>{{number_format($zchild->pagu_okt,0,",",".")}}</td>
                                            <td>{{number_format($zchild->pagu_nov,0,",",".")}}</td>
                                            <td>{{number_format($zchild->pagu_des,0,",",".")}}</td>
                                    </tr>
                                    @if($zchild->children->count())
                                    @foreach($zchild->children as $zzchild)
                                    <tr>
                                        <td>{{$zzchild->sub_kegiatan->kode_sub_kegiatan}}</td>
                                        <td>
                                            {{$zzchild->sub_kegiatan->nama_sub_kegiatan}}
                                        </td>
                                        <td>{{number_format(@$zzchild->pagu_total,0,",",".")}}</td>
                                        <!-- <td>{{number_format(@$zzchild->sisa_pagu,0,",",".")}}</td> -->
                                        <td>{{number_format(@$zzchild->pagu_jan,0,",",".")}}</td>
                                            <td>{{number_format($zzchild->pagu_feb,0,",",".")}}</td>
                                            <td>{{number_format($zzchild->pagu_mar,0,",",".")}}</td>
                                            <td>{{number_format($zzchild->pagu_apr,0,",",".")}}</td>
                                            <td>{{number_format($zzchild->pagu_mei,0,",",".")}}</td>
                                            <td>{{number_format($zzchild->pagu_jun,0,",",".")}}</td>
                                            <td>{{number_format($zzchild->pagu_jul,0,",",".")}}</td>
                                            <td>{{number_format($zzchild->pagu_agt,0,",",".")}}</td>
                                            <td>{{number_format($zzchild->pagu_sep,0,",",".")}}</td>
                                            <td>{{number_format($zzchild->pagu_okt,0,",",".")}}</td>
                                            <td>{{number_format($zzchild->pagu_nov,0,",",".")}}</td>
                                            <td>{{number_format($zzchild->pagu_des,0,",",".")}}</td>
                                    </tr>
                                        @if($zzchild->children->count())
                                        @foreach($zzchild->children as $achild)
                                        <tr>
                                            <td>{{$achild->rincian->kode_rincian}}</td>
                                            <td>{{$achild->rincian->nama_rincian}}
                                            </td>
                                            <td>{{number_format($achild->pagu_total, 0,",",".")}}</td>
                                            <!-- <td>{{number_format($achild->sisa_pagu, 0,",",".")}}</td> -->
                                            <td>{{number_format(@$achild->pagu_jan,0,",",".")}}</td>
                                            <td>{{number_format($achild->pagu_feb,0,",",".")}}</td>
                                            <td>{{number_format($achild->pagu_mar,0,",",".")}}</td>
                                            <td>{{number_format($achild->pagu_apr,0,",",".")}}</td>
                                            <td>{{number_format($achild->pagu_mei,0,",",".")}}</td>
                                            <td>{{number_format($achild->pagu_jun,0,",",".")}}</td>
                                            <td>{{number_format($achild->pagu_jul,0,",",".")}}</td>
                                            <td>{{number_format($achild->pagu_agt,0,",",".")}}</td>
                                            <td>{{number_format($achild->pagu_sep,0,",",".")}}</td>
                                            <td>{{number_format($achild->pagu_okt,0,",",".")}}</td>
                                            <td>{{number_format($achild->pagu_nov,0,",",".")}}</td>
                                            <td>{{number_format($achild->pagu_des,0,",",".")}}</td>

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
