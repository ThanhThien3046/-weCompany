<div id="js__sidebar" class="sidebar">
    <div class="sidebar__wrapper-toggle">
        <ul id="js__open-nav" class="sidebar__toggle-menu">
            <li class="sidebar__toggle-item item"></li>
            <li class="sidebar__toggle-item item"></li>
            <li class="sidebar__toggle-item item"></li>
            {{-- <li class="sidebar__toggle-item item"></li>
            <li class="sidebar__toggle-item item"></li> --}}
        </ul>
        <a href="{{ Route("HOME_PAGE") }}" class="link__homepage">
            {{ Config::get('app.name') }}
        </a>
    </div>
    <ul class="sidebar__nav">
        <li class="sidebar__nav-item">
            <a class="sidebar__nav-link home" href="{{ Route('HOME_PAGE') }}">
                @include('svg.home')
                <span>トップページ</span>
            </a>
        </li>
        <li class="sidebar__nav-item">
            <a class="sidebar__nav-link" href="{{ Route('WEHOMES_PAGE') }}">
                @include('svg.gallery')
                <span>We Group</span>
            </a>
        </li>
        <li class="sidebar__nav-item">
            <a class="sidebar__nav-link ranking" href="{{ Route('SEARCH_PAGE') }}">
                @include('svg.ranking')
                <span>沿革</span>
            </a>
        </li>
        <li class="sidebar__nav-item">
            <a class="sidebar__nav-link find" href="{{ Route('RECRUIT') }}">
                @include('svg.find')
                <span>求人</span>
            </a>
        </li>
        <li class="sidebar__nav-item">
            <a class="sidebar__nav-link about" href="{{ Route('ABOUT') }}">
                @include('svg.about')
                <span>WEとは</span>
            </a>
        </li>
        <li class="sidebar__nav-item">
            <a class="sidebar__nav-link icon__facebook" href="https://www.facebook.com/WeCompany-101388528801770" target="_blank">
                <i class="fab fa-facebook-f"></i>
            </a>
        </li>
        <li class="sidebar__nav-item">
            <a class="sidebar__nav-link icon__twitter" href="https://twitter.com/_WE_COMPANY" target="_blank">
                <i class="fab fa-twitter"></i>
            </a>
        </li>
        <li class="sidebar__nav-item">
            <a class="sidebar__nav-link icon__instagram" href="https://www.instagram.com/_we_company/" target="_blank">
                <i class="fab fa-instagram"></i>
            </a>
        </li>
        <li class="sidebar__nav-item">
            <a class="sidebar__nav-link icon__youtube" href="https://www.youtube.com/channel/UC7EMHAnUXRbIyVTkJ4eYsRw" target="_blank">
                <i class="fab fa-youtube"></i>
            </a>
        </li>
    </ul>
    <a class="sidebar__bottom-metro" href="{{ env('METRO') }}">
        @include('svg.metro')
    </a>
</div>