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
                    <section class="content">
                        <header class="header_content">
                            <h3>広告ギャラリー</h3>
                            <p>広告ポスター・CM情報</p>
                        </header>
                        <div class="main-content01">
                            <article class="news">
                                <header class="banner-img">
                                    <h4><img src="{{ asset('images/station_oshiage_img.jpg') }}"></h4>
                                </header>
                                <div>
                                    <div>
                                        <p>ポスター「江戸がいまでも華やぐ」篇</p>
                                        <div><img src="{{ asset('images/gallery_2003_01.jpg') }}" alt="ポスター「江戸がいまでも華やぐ」篇" width="800" height="283"></div>
                                        <div>
                                            <p>壁紙ダウンロード</p>
                                            <ul class="listbtn">
                                                <li class="btn"></li>
                                                <li class="btn"></li>
                                                <li class="whilebtn"></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="relation-img">
                                        <div class="relation-img-text">
                                            <p>関連記事リンク</p>
                                        </div>
                                        <div class="relation-img-list">
                                            <article class="reImg">
                                                <a href="" class="reImg_detail">
                                                    <div class="__reImg" style="background-image: url({{ asset('images/challenge602_top01.jpg')}})" ></div>
                                                </a>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                                <footer class="fpic">
                                    <a href="/" class="ftimage">「押上〈スカイツリー前〉」のチャレンジをみる </a>
                                </footer>
                            </article>
                        </div>
                        <footer></footer>
    
                    </section>
                </div>
            </div>
            <footer></footer>
        </div>
    </div>
</div>



@endsection
