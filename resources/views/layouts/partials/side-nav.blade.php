<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img class="w-12" src="{{asset('img/waterdistrict_logo.png')}}" style="border-radius:30px;">
        <span class="hidden xl:block text-white text-lg ml-3">IMSHR</span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{route('home')}}" class="side-menu {{(!request()->routeIs('home'))?:'side-menu--active'}}">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="{{route('attendance.index')}}" class="side-menu {{(!request()->routeIs('attendance.*'))?:'side-menu--active'}}">
                <div class="side-menu__icon"> <i data-feather="calendar"></i> </div>
                <div class="side-menu__title"> Attendance </div>
            </a>
        </li>
        <li>
            <a href="{{route('employee.index')}}" class="side-menu {{(!request()->routeIs('employee.index'))?:'side-menu--active'}}">
                <div class="side-menu__icon">  <i data-feather="users"></i></div>
                <div class="side-menu__title"> Employees </div>
            </a>
        </li>
        <li>
            <a href="{{route('employee.overtime.index')}}" class="side-menu {{(!request()->routeIs('employee.overtime.*'))?:'side-menu--active'}}">
                <div class="side-menu__icon"> <i data-feather="clipboard"></i></div>
                <div class="side-menu__title"> Overtime </div>
            </a>
        </li>
        <li>
            <a href="{{route('employee.schedule')}}" class="side-menu {{(!request()->routeIs('employee.schedule'))?:'side-menu--active'}}">
                <div class="side-menu__icon"> <i data-feather="clock"></i></div>
                <div class="side-menu__title"> Schedule </div>
            </a>
        </li>
        <li>
            <a href="{{route('payroll.index')}}" class="side-menu {{(!request()->routeIs('payroll.*'))?:'side-menu--active'}}">
                <div class="side-menu__icon"> <i data-feather="credit-card"></i> </div>
                <div class="side-menu__title"> Payroll </div>
            </a>
        </li>
    </ul>
</nav>