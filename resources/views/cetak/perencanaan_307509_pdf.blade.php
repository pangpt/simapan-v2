<!doctype html>
<html lang="{{ config('app.locale') }}" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Perencanaan 307509</title>

        <meta name="description" content="Sipettuni - Sistem Informasi Pengganti Status Kawin">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Icons -->
        <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('dist/img/simapan-icon.png') }}">

        <!-- Fonts and Styles -->
<!-- Font Awesome -->
<!-- <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" id="css-main" href="{{ asset('dist/css/codebase.css') }}">

        <link rel="stylesheet" id="css-theme" href="{{ asset('dist/css/themes/flat.css') }}"> -->

        <!-- Scripts -->
        <!-- <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script> -->
    </head>
    <body>
        <div id="page-container" class="main-content-boxed">
            <!-- Main Container -->
            <main id="main-container">
                

      <!-- Default box -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12 text-center">
              <h1>Perencanaan Satker 307509</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>


      <div class="card">
        <div class="card-body p-0">
          <table id="example2" class="table table-bordered" style="font-size:10px">
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
                                            <!-- <td>{{$achild->rincian->kode_rincian}}</td> -->
                                            <td>-</td>
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
            </main>
            <!-- END Main Container -->
        </div>

        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        <!-- <script src="{{ asset('dist/js/codebase.app.js') }}"></script> -->
        <!-- <script src="https://www.google.com/recaptcha/api.js"></script> -->
    </body>
</html>
