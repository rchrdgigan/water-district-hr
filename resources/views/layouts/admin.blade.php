<!DOCTYPE html>

<html lang="en" class="light">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="{{asset('img/waterdistrict_logo.png')}}" rel="shortcut icon">

    <title>@yield('title')</title>
    @stack('custom-links')
    <link rel="stylesheet" href="{{asset('dist/css/app.css')}}" />
</head>
<!-- END: Head -->
<body class="app">
    <!-- BEGIN: Mobile Menu -->
    @include('layouts.partials.mobile-nav')
    <div class="flex">
        @include('layouts.partials.side-nav')
        <div class="content">
            @include('layouts.partials.top-bar')
            @include('sweetalert::alert')
            @yield('content')
        </div>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="{{asset('dist/js/app.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('custom-scripts')
</body>
</html>