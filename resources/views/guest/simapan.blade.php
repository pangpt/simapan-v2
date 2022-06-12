@extends('layouts.home')

@section('title', 'SI-MAPAN')

@section('content')
    <!-- Hero -->
    <div class="bg-white bg-pattern hero-bubbles">
        <div class="hero overflow-hidden">
            <div class="hero-inner">
                <div class="content content-full text-center">
                    <div class="pt-100 pb-150">
                        <h2 class="h3 font-w400 text-muted mt-20 mb-50 invisible" data-toggle="appear" data-class="animated fadeInDown" data-timeout="300">
                            Selamat Datang di SI-MAPAN
                        </h2>
                        <div class="invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="300">
                            <a class="btn btn-hero btn-alt-primary min-width-175 mb-10 mx-5" href="{{route('home.perencanaan')}}">
                                307509
                            </a>
                            <a class="btn btn-hero btn-alt-info min-width-175 mb-10 mx-5" href="{{route('perencanaansatker')}}">
                                309076
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->
@endsection

