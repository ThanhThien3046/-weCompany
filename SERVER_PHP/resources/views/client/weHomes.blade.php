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
    {{-- preload  --}}
    <link rel="preload" as="style" href="{{ asset('css/weHomes.css' . Config::get('app.version'))}}">
@endsection
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/animate.min.css' . Config::get('app.version'))}}">
    <link rel="stylesheet" href="{{ asset('css/home.css' . Config::get('app.version'))}}">
    <link rel="stylesheet" href="{{ asset('css/weHomes.css' . Config::get('app.version'))}}">
@endsection
@section('javascripts')
    <script type="text/javascript" src="{{ asset('js/library/jquery.min.js' . Config::get('app.version')) }}"></script>
    <script type="text/javascript" src="{{ asset('js/search.js' . Config::get('app.version')) }}"></script>
    <script type="text/javascript" src="{{ asset('js/home.js' . Config::get('app.version')) }}"></script>
@endsection
@section('content')

<div class="wrapper__sidebar animated fadeIn">
    @include('partial.sidebar')
    @include('partial.nav')
</div>
<div class="wrapper__content">
    <div class="wrapper" >
        <div class="main">
            <header>
                
            </header>
            <div class="non-display"></div>
            <div>
                <div class="main-content">
                    <div class="content">
                        <div class="header_content">
                            <h3 class="header_content--title">WE グループ紹介</h3>
                            <p class="header_content--title-des">広告・ニュース&トピック情報</p>
                        </div>
                        <div class="wechild__wrapper">
                            <article class="wechild__news">
                                <header class="wechild__news-banner">
                                    <h4><img src="{{ asset('images/homes_banner.jpg') }}"></h4>
                                </header>
                                <div>
                                    <div>
                                        <p class="wechild__news-des">ポスター「江戸がいまでも華やぐ」篇</p>
                                        <div class="wechild__news-detail">
                                            <img src="{{ asset('images/banner_02.jpg') }}" alt="ポスター「江戸がいまでも華やぐ」篇" width="800" height="283">
                                        </div>
                                    </div>
                                    <div class="div_text">
                                        <p>WE グループ紹介</p>
                                    </div>
                                    <div class="main__list" id="js__format-height-article">
                                        @php $challenges = Config::get("challenge") @endphp
                                        @foreach ($challenges as $key => $challenge)
                                        @php 
                                        if( $key == 3 ){
                                            break;
                                        }
                                        $index = $key + 1;
                                        $clear = 'article__default ';
                                        
                                        if($challenge['type'] == 2){
                                            $clear = 'article__right';
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
                                <footer class="fpic">
                                    <a href="/" class="ftimage">サイトTOP</a>

                                </footer>
                            </article>
                            
                        </div>

    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partial.footer')



@endsection
