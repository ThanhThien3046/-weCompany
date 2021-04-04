<div id="js__sidebar" class="sidebar">
    <div class="sidebar__wrapper-toggle">
        <ul id="js__open-nav" class="sidebar__toggle-menu">
            <li class="sidebar__toggle-item item"></li>
            <li class="sidebar__toggle-item item"></li>
            <li class="sidebar__toggle-item item"></li>
            <li class="sidebar__toggle-item item"></li>
            <li class="sidebar__toggle-item item"></li>
        </ul>
        <a href="{{ Route("HOME_PAGE") }}" class="link__homepage">
            {{ Config::get('app.name') }}
        </a>
    </div>
    <ul class="sidebar__nav">
        <li class="sidebar__nav-item">
            <a class="sidebar__nav-link home" href="{{ Route('HOME_PAGE') }}">
                @include('svg.home')
            </a>
        </li>
        <li class="sidebar__nav-item">
            <a class="sidebar__nav-link" href="{{ Route('HOME_PAGE') }}">
                @include('svg.gallery')
            </a>
        </li>
        <li class="sidebar__nav-item">
            <a class="sidebar__nav-link ranking" href="{{ Route('HOME_PAGE') }}">
                @include('svg.ranking')
            </a>
        </li>
        <li class="sidebar__nav-item">
            <a class="sidebar__nav-link find" href="{{ Route('HOME_PAGE') }}">
                @include('svg.find')
            </a>
        </li>
        <li class="sidebar__nav-item">
            <a class="sidebar__nav-link about" href="{{ Route('HOME_PAGE') }}">
                @include('svg.about')
            </a>
        </li>
        <li class="sidebar__nav-item">
            <a class="sidebar__nav-link icon__facebook" href="{{ Route('HOME_PAGE') }}">
                <i class="fab fa-facebook-f"></i>
            </a>
        </li>
        <li class="sidebar__nav-item">
            <a class="sidebar__nav-link icon__twitter" href="{{ Route('HOME_PAGE') }}">
                <i class="fab fa-twitter"></i>
            </a>
        </li>
        <li class="sidebar__nav-item">
            <a class="sidebar__nav-link icon__instagram" href="{{ Route('HOME_PAGE') }}">
                <!--<i class="fab fa-instagram"></i>-->
                <svg width="50%" height="50%" viewBox="-100 -100 400 400">
                    <defs>
                        <!-- 矩形的線性漸層 -->
                        <linearGradient id="gradient1" x1=".8" y1=".8" x2="0">
                            <stop offset="0" stop-color="#1da1f2"/>
                            <stop offset="1" stop-color="#1da1f2"/>
                        </linearGradient>
                        <!-- 矩形的放射漸層 -->
                        <radialGradient id="gradient2" cx=".2" cy="1" r="1.2">
                            <stop offset="0" stop-color="#1da1f2"/>
                            <stop offset=".1" stop-color="#1da1f2"/>
                            <stop offset=".25" stop-color="#1da1f2"/>
                            <stop offset=".35" stop-color="#1da1f2"/>
                            <stop offset=".65" stop-color="#1da1f2" stop-opacity="0" />
                        </radialGradient>
                        <!-- 矩形外框 -->
                        <rect id="logoContainer" x="0" y="0" width="200" height="200" rx="50" ry="50" />
                    </defs>

                    <!-- colorful 的背景 -->
                    <use xlink:href="#logoContainer" fill="url(#gradient1)" />
                    <use xlink:href="#logoContainer" fill="url(#gradient2)" />

                    <!-- 相機外框 -->
                    <rect x="35" y="35" width="130" height="130" rx="30" ry="30"
                        fill="none" stroke="#fff" stroke-width="13" />

                    <!-- 鏡頭外框 -->
                    <circle cx="100" cy="100" r="32"
                            fill="none" stroke="#fff" stroke-width="13" />

                    <!-- 閃光燈 -->
                    <circle cx="140" cy="62" r="9" fill="#fff"/>
                </svg>
            </a>
        </li>
    </ul>
    <a class="sidebar__bottom-metro" href="{{ env('METRO') }}">
        @include('svg.metro')
    </a>
</div>