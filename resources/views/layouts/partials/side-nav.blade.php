<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img class="w-12" src="{{asset('img/waterdistrict_logo.png')}}">
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
            <a href="javascript:;" class="side-menu {{(!request()->routeIs('employee.*'))?:'side-menu--active'}}">
                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                <div class="side-menu__title">Employees <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down side-menu__sub-icon"><polyline points="6 9 12 15 18 9"></polyline></svg> </div>
            </a>
            <ul class="" style="display: none;">
                <li>
                    <a href="{{route('employee.index')}}" class="side-menu {{(!request()->routeIs('employee.index'))?:'side-menu--active'}}">
                        <div class="side-menu__icon">  <i data-feather="clipboard"></i></div>
                        <div class="side-menu__title"> Employees List </div>
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
                        <div class="side-menu__icon"> <i data-feather="clipboard"></i></div>
                        <div class="side-menu__title"> Schedule </div>
                    </a>
                </li>
            </ul>
        </li>
        
        <li>
            <a href="{{route('deduction.index')}}" class="side-menu {{(!request()->routeIs('deduction.*'))?:'side-menu--active'}}">
                <div class="side-menu__icon"> <i data-feather="user-minus"></i> </div>
                <div class="side-menu__title"> Deduction </div>
            </a>
        </li>

        <li>
            <a href="{{route('position.index')}}" class="side-menu {{(!request()->routeIs('position.*'))?:'side-menu--active'}}">
                <div class="side-menu__icon"> <i data-feather="briefcase"></i> </div>
                <div class="side-menu__title"> Position </div>
            </a>
        </li>

        <li>
            <a href="{{route('schedule.index')}}" class="side-menu {{(!request()->routeIs('schedule.*'))?:'side-menu--active'}}">
                <div class="side-menu__icon"> <i data-feather="clock"></i> </div>
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