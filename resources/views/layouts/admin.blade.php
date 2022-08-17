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
            @yield('content')
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="{{asset('dist/js/app.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('custom-scripts')
</body>
</html>