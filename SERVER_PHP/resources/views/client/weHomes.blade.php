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
                            @php $wegroups = Config::get("wegroup") @endphp
                            @foreach ($wegroups as $key => $group)

                            <article class="wechild__news">
                                <header class="wechild__news-banner">
                                    <h4>
                                        <img src="{{ asset($group['banner']) }}" />
                                    </h4>
                                </header>
                                <div>
                                    <div>
                                        <p class="wechild__news-des">{{ $group['text'] }}</p>
                                        <div class="wechild__news-detail">
                                            <img src="{{ asset($group['img']) }}" alt="{{ $group['text'] }}" width="800" height="283">
                                        </div>
                                    </div>
                                    <div class="div_text">
                                        <p>{{ $group['weintro'] }}</p>
                                    </div>
                                    <div class="main__list" id="js__format-height-article">

                                        @foreach ($group['news'] as $key => $news)
                                        @php 
                                        if( $key == 3 ){
                                            break;
                                        }
                                        $index = $key + 1;
                                        $clear = 'article__default ';
                                        
                                        if($news['type'] == 2){
                                            $clear = 'article__right';
                                        }
                                        if($news['type'] == 3){
                                            $clear .= 'article__left';
                                        }
                                        
                                        @endphp
                                        <article class="article {{ $clear }}">
                                            <div class="article__wrapper">
                                                <span class="article__challenge">
                                                    <i class="article__challenge-number">{{ $news['number'] }}</i>
                                                </span>
                                                <a class="article__link-img" href="{{ $news['link'] }}">
                                                    <img class="lazyload"
                                                            src="{{ Config::get('app.lazyload_base64') }}"
                                                            onerror="this.onerror=null;this.src='{{ asset('/images/failed.jpg') }}';"
                                                            data-src="{{ Route('IMAGE_RESIZE', [ 'size' => ( $news['type'] == 1 ? 'medium' : 'double' ) , 'type' => 'fit', 'imagePath' => trim($news['img'], '/') ]) }}"
                                                            alt="" width="300" height="300"/>
                                                </a>
                                                <a class="article__link-title">
                                                    <h3 class="title">{{ $news['title'] }}</h3>
                                                </a>
                                            </div>
                                        </article>
                                        @endforeach
                                    </div>
                                </div>
                                
                            </article>
                            @endforeach

                            <footer class="fpic">
                                <a href="/" class="ftimage">サイトTOP</a>
                            </footer>
                        </div>

    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partial.footer')
@endsection
