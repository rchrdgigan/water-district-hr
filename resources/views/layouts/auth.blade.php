<!DOCTYPE html>
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="{{asset('img/waterdistrict_logo.png')}}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{asset('dist/css/app.css')}}" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="{{url('/')}}" class="-intro-x flex items-center pt-5">
                        <img alt="" class="w-12" src="{{asset('img/waterdistrict_logo.png')}}" style="border-radius:30px;">
                        <span class="text-white text-lg ml-3">IMSHR
                    </a>
                    <div class="my-auto">
                        <!-- <img alt="" class="-intro-x w-30 -mt-16" src="{{asset('img/waterdistrict_logo.png')}}"> -->
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            {{(!request()->routeIs('register'))?'Sign-In':'Sign-Up'}}
                             here
                            <br>
                            your account.
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white dark:text-gray-500">Manage all employees data.</div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        @yield('content')
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>

        <script src="{{asset('dist/js/app.js')}}"></script>
        <!-- END: JS Assets-->
    </body>
</html>