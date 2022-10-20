<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img width="65px" src="{{asset('img/waterdistrict_logo.png')}}" style="border-radius:30px;"><h2 class="intro-y text-lg font-medium ml-3 text-white">IMSHR</h2>
        </a>
        <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <ul class="border-t border-theme-24 py-5 hidden">
        <li>
            <a href="{{route('home')}}" class="menu {{(!request()->routeIs('home'))?:'menu--active'}}">
                <div class="menu__icon"> <i data-feather="home"></i> </div>
                <div class="menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="{{route('attendance.index')}}" class="menu {{(!request()->routeIs('attendance.*'))?:'menu--active'}}">
                <div class="menu__icon"> <i data-feather="calendar"></i> </div>
                <div class="menu__title"> Attendance </div>
            </a>
        </li>
        <li>
            <a href="{{route('employee.index')}}" class="menu {{(!request()->routeIs('employee.index'))?:'menu--active'}}">
                <div class="menu__icon"> <i data-feather="clipboard"></i> </div>
                <div class="menu__title"> Employees List </div>
            </a>
        </li>
        <li>
            <a href="{{route('employee.overtime.index')}}" class="menu {{(!request()->routeIs('employee.overtime.*'))?:'menu--active'}}">
                <div class="menu__icon"> <i data-feather="clipboard"></i> </div>
                <div class="menu__title"> Overtime </div>
            </a>
        </li>
        <li>
            <a href="{{route('employee.schedule')}}" class="menu {{(!request()->routeIs('employee.schedule'))?:'menu--active'}}">
                <div class="menu__icon"> <i data-feather="clipboard"></i> </div>
                <div class="menu__title"> Schedule </div>
            </a>
        </li>
        <li>
            <a href="{{route('payroll.index')}}" class="menu menu">
                <div class="menu__icon"> <i data-feather="credit-card"></i> </div>
                <div class="menu__title"> Payroll </div>
            </a>
        </li>
    </ul>
</div>