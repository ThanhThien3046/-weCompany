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
    <link rel="stylesheet" href="{{ asset('css/policy.css' . Config::get('app.version'))}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet">
@endsection
@section('javascripts')
    <script type="text/javascript" src="{{ asset('js/library/jquery.min.js' . Config::get('app.version')) }}"></script>
	<script type="text/javascript" src="{{ asset('js/home.min.js' . Config::get('app.version')) }}"></script>
@endsection
@section('content')

<div class="wrapper__sidebar animated fadeIn">
    @include('partial.sidebar')
    @include('partial.nav')
</div>
<div class="wrapper__content">
    <div class="homeslider">
        <div class="homeslider__intro">
            <h1>We Company</h1>
            <p>あなたもチャレンジ</p>
        </div>
        <div id="js__homeslider" class="homeslider__wrapper lazyload">
            <!--slide contents-->
            <div class="homeslider__item" 
            style="background-image: url('{{ asset('images/bg2.jpg') }}');"
            data-src-mobile="{{ asset('images/sptop01_2004_02.jpeg') }}"></div>
            <div class="homeslider__item" 
            style="background-image: url('{{ asset('images/bg3.jpg') }}');"
            data-src-mobile="{{ asset('images/sptop02_2004_02.jpeg') }}"></div>
            <div class="homeslider__item" 
            style="background-image: url('{{ asset('images/bg4.jpg') }}');"
            data-src-mobile="{{ asset('images/sptop01_2004_02.jpeg') }}"></div>
            <div class="homeslider__item homeslider__item-video">
                <video autoplay muted loop="true">
                    {{-- <source src="video.webm" type="video/webm" />  --}}
                    <source src="{{ asset('/video/video-homepage.mp4') }}" type="video/mp4" />
                </video>
            </div>
        </div>
    </div>
    <div class="content__main homepage">
        <div class="wrapper__about-page">
            <h2>コンプライアンス基本方針</h2>
            <span>COMPLIANCE</span>
            
            <p>当社の役職員は、業務遂行にあたり、法令等を尊重し、ビジネスマナーを守り、社会規範に
            沿った責任ある行動をとります。<br>
            【遵守事項】<br>
            • 人権を尊重し、差別、ハラスメントを行いません。<br>
            • 取引遂行に当たっては、法令等を遵守し、公正を旨とします。<br>
            • 会社の情報を適切に管理するとともに、社外から得た情報や第三者の知的財産等の権利についても適切に取り扱います。<br>
            • 会社の利益に反する行為は行いません。<br>
            • 反社会的勢力には毅然として対応し、利益供与は一切行いません。<br>
            制定年月日　平成30年2月26日 <br>
            最終改訂年月日 令和2年8月1日 <br>
            株式会社WECOMPANY <br>
            代表取締役　長谷川　美佳</p>
        </div>
    </div>
    <div class="divbtntotop" id="js__back-to-top"><a class="btntotop">TOPへ戻る</a></div>
    
</div>
@include('partial.footer')


@endsection