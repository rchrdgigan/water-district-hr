<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img class="w-20" src="{{asset('img/waterdistrict_logo.png')}}">
        </a>
        <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <ul class="border-t border-theme-24 py-5 hidden">
        <li>
            <a href="{{route('home')}}}}" class="menu menu menu--active">
                <div class="menu__icon"> <i data-feather="home"></i> </div>
                <div class="menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="#" class="menu menu">
                <div class="menu__icon"> <i data-feather="calendar"></i> </div>
                <div class="menu__title">Example Nav  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down side-menu__sub-icon"><polyline points="6 9 12 15 18 9"></polyline></svg> </div>
            </a>
            <ul class="" style="display: none;">
                <li>
                    <a href="" class="menu ">
                        <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg> </div>
                        <div class="menu__title">Example Nav  </div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>