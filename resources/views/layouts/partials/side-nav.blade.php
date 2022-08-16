<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img class="w-12" src="{{asset('img/waterdistrict_logo.png')}}">
        <span class="hidden xl:block text-white text-lg ml-3">IMSHR</span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{route('home')}}" class="side-menu side-menu--active">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="#" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="calendar"></i> </div>
                <div class="side-menu__title"> Attendance </div>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                <div class="side-menu__title">Employees <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down side-menu__sub-icon"><polyline points="6 9 12 15 18 9"></polyline></svg> </div>
            </a>
            <ul class="" style="display: none;">
                <li>
                    <a href="" class="side-menu">
                        <div class="side-menu__icon">  <i data-feather="clipboard"></i></div>
                        <div class="side-menu__title"> Example Navbar </div>
                    </a>
                </li>
                <li>
                    <a href="" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="clipboard"></i></div>
                        <div class="side-menu__title"> Example Navbar </div>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="user-minus"></i> </div>
                <div class="side-menu__title"> Deduction </div>
            </a>
        </li>

        <li>
            <a href="#" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="briefcase"></i> </div>
                <div class="side-menu__title"> Position </div>
            </a>
        </li>

        <li>
            <a href="#" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="credit-card"></i> </div>
                <div class="side-menu__title"> Payroll </div>
            </a>
        </li>

        <li>
            <a href="#" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="clock"></i> </div>
                <div class="side-menu__title"> Schedule </div>
            </a>
        </li>
    </ul>
</nav>