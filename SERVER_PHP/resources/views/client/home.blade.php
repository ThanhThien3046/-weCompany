@extends('_Layout.client')

@section('title', Config::get("app.name"))
@section('description', Config::get("app.description"))

@section('meta-seo')
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ Config::get("app.og_name") }}" />
    <meta property="og:description" content="{{ Config::get("app.og_description") }}" />
    <meta property="og:url" content="{{ asset('/') }}" />
    <meta property="og:site_name" content="{{ Config::get("app.og_name") }}" />
    <meta property="og:image" content="{{ asset(Config::get("app.image")) }}" />
    <meta property="og:image:secure_url" content="{{ asset(Config::get("app.image")) }}" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="{{ Config::get("app.description") }}" />
    <meta name="twitter:title" content="{{ Config::get("app.og_name") }}" />
    <meta name="twitter:site" content="{{ Config::get('site_fb') }}" />
    <meta name="twitter:image" content="{{ asset(Config::get("app.image")) }}" />
@endsection

@section('preload')
    <link rel="preload" as="style" href="{{ asset('css/home.css' . Config::get('app.version'))}}">
    {{-- <link rel="preload" as="font" type="font/woff2" crossorigin href="/font/font-awe/webfonts/fa-solid-900.woff2"/>
    <link rel="preload" as="font" type="font/woff2" crossorigin href="/font/font-awe/webfonts/fa-light-300.woff2"/>
    <link rel="preload" as="font" type="font/woff2" crossorigin href="/font/font-awe/webfonts/fa-duotone-900.woff2"/>
    <link rel="preload" as="font" type="font/woff2" crossorigin href="/font/IconFont/webfont.woff2?v=1.4.57"/> --}}
@endsection
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/animate.min.css' . Config::get('app.version'))}}">
    <link rel="stylesheet" href="{{ asset('css/home.css' . Config::get('app.version'))}}">
@endsection
@section('javascripts')
    <script type="text/javascript" src="{{ asset('js/library/jquery.min.js' . Config::get('app.version')) }}"></script>
	<script type="text/javascript" src="{{ asset('js/home.js' . Config::get('app.version')) }}"></script>
@endsection
@section('content')
    <div class="wrapper__sidebar animated fadeIn">
        @include('partial.sidebar')
        @include('partial.nav')
    </div>
    <div class="wrapper__content">
        <div class="homeslider">
            <div id="js__homeslider" class="homeslider__wrapper lazyload">
                <!--slide contents-->
                <div class="homeslider__item" 
                style="background-image: url('{{ asset('images/pcside01_2004_02.jpg') }}');"
                data-src-mobile="{{ asset('images/sptop01_2004_02.jpeg') }}"></div>
                <div class="homeslider__item" 
                style="background-image: url('{{ asset('images/pcside02_2001.jpg') }}');"
                data-src-mobile="{{ asset('images/sptop02_2004_02.jpeg') }}"></div>
                <div class="homeslider__item" 
                style="background-image: url('{{ asset('images/pcside04_2001.jpg') }}');"
                data-src-mobile="{{ asset('images/sptop01_2004_02.jpeg') }}"></div>
                <div class="homeslider__item homeslider__item-video">
                    <video autoplay muted loop="true">
                        {{-- <source src="video.webm" type="video/webm" /> --}}
                        <source src="{{ asset('/video/video-homepage.mp4') }}" type="video/mp4" />
                    </video>
                </div>
            </div>
        </div>
        <div class="content__main homepage">
            <div class="main__list" id="js__format-height-article">
                @php $challenges = Config::get("challenge") @endphp
                @foreach ($challenges as $key => $challenge)
                @php 
                $index = $key + 1;
                $clear = 'article__default ';
                
                if($challenge['type'] == 2){
                    $clear .= 'article__right';
                }
                if($challenge['type'] == 3){
                    $clear .= 'article__left';
                }
                
                @endphp
                <article class="article {{ $clear }}">
                    <div class="article__wrapper">
                        <span class="article__challenge">
                            <i class="article__challenge-number">{{ $challenge['number'] }}</i>
                        </span>
                        <a class="article__link-img" href="{{ $challenge['link'] }}">
                            <img class="lazyload"
                                    src="{{ Config::get('app.lazyload_base64') }}"
                                    onerror="this.onerror=null;this.src='{{ asset('/images/failed.jpg') }}';"
                                    data-src="{{ asset($challenge['img']) }}" 
                                    alt="" width="300" height="300"/>
                        </a>
                        <a class="article__link-title">
                            <h3 class="title">{{ $challenge['title'] }}</h3>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </div>
@endsection