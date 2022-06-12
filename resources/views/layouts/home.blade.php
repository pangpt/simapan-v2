<!doctype html>
<html lang="{{ config('app.locale') }}" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>@yield('title', config('app.name'))</title>
	    {{-- <link href="{{asset('images/logo-pa.png')}}" rel="icon" type="image/png"> --}}

        <meta name="description" content="Sipettuni - Sistem Informasi Pengganti Status Kawin">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Icons -->
        {{-- <link rel="shortcut icon" href="{{asset('images/logo-pa.png')}}"> --}}
        <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('dist/img/simapan-icon.png') }}">
        {{-- <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}"> --}}

        <!-- Fonts and Styles -->
        @yield('css_before')
        @include('includes.styles')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="{{ asset('dist/css/codebase.css') }}">
        {{-- {!! NoCaptcha::renderJs() !!} --}}

{{--        <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->--}}
        <link rel="stylesheet" id="css-theme" href="{{ asset('dist/css/themes/flat.css') }}">
        @yield('css_after')

        <!-- Scripts -->
        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
    </head>
    <body>
        @include('includes.guest.nav')
        <div id="page-container" class="main-content-boxed">
            <!-- Main Container -->
            <main id="main-container">
                @yield('content')
            </main>
            <!-- END Main Container -->
        </div>

        {{-- @include('includes.footer') --}}
        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        <script src="{{ asset('dist/js/codebase.app.js') }}"></script>
        <script src="https://www.google.com/recaptcha/api.js"></script>

        @yield('js_after')
    </body>
</html>
