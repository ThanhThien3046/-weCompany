

<div class="header">
    
    <div class="main__header">
        <span class="header__toggle_sidebar" onclick="toggle_sidebar()">
            <i class="js_icon_fa_toggle fad fa-bars"></i>
        </span>
        <div class="header__nav">
            <ul class="header__nav__navigate">
                <li class="header__nav__navigate__link {{ Route::is("ADMIN_DASHBOARD") ? 'active' : null}}">
                    <a href="{{ Route('ADMIN_LOGOUT') }}">dashboard</a>
                </li>
            </ul>
        </div>
        <div class="setting">
            <a class="avatar">
                <img class="avatar__img" src="{{ asset(Auth::user()->avatar) }}" />
                <i class="avatar__icon_down hero-icon hero-menu-down-outline"></i>
            </a>
            <ul class="dropdown">
                <li><a >{{ Auth::user()->email }}</a></li>
                <li><a href="{{ Route('ADMIN_LOGOUT') }}">logout</a></li>
            </ul>
        </div>
    </div>

    @if (trim($__env->yieldContent('page_title')))    
    <div class="sub__header">
        @yield('page_title')
    </div>
    @endif
    
</div>