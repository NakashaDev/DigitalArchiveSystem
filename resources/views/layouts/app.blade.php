<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="{{asset('assets/fonts/icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/choices.js/styles/choices.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" />

    @yield('header-style')

    <!-- Scripts -->
    @vite(['resources/sass/bootstrap.scss', 'resources/sass/app.scss', 'resources/js/app.js'])

    @yield('custom-style')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <div id="app">
        @guest
        <main>
            @yield('content')
        </main>
        @else
        @include('layouts.topbar')
        @include('layouts.sidebar')
        <div class='main-content'>
            <div class='page-content'>
                @yield('content')
            </div>
            @include('layouts.footer')
        </div>
        @endguest
    </div>
    <script src="{{asset('assets/libs/metismenujs/metismenujs.min.js')}}"></script>
    <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('assets/libs/choices.js/scripts/choices.min.js')}}"></script>
    <script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>
    @yield('footer-script')
    <script src=" {{asset('assets/js/common-form.js')}}"></script>
    <script src="{{asset('assets/js/common-init.js')}}"></script>
</body>

</html>