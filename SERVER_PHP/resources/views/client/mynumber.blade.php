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
           
            <h2>特定個人情報等の適正な取り扱いに関する基本方針</h2>
            <span>MYNUMBER</span>
            <b>1. 事業者の名称</b>
            <p>株式会社WECOMPANY</p>
            <b>2. 関係法令・ガイドライン等の遵守</b>
            <p>当社は、「行政手続きにおける特定の個人を識別するための番号の利用等に関する法律」、「個人情報の保護に関する法律」及び「特定個人情報の適正な取扱いに関するガイドライン（事業者編）」を遵守し、特定個人情報等の適正な取り扱いを行います。</p>
            <b>3. 安全管理措置に関する事項</b>
            <p>当社は、特定個人情報等の安全管理措置に関して、別途「特定個人情報等の取扱規程」を定めています。</p>
            <b>4. 継続的改善</b>
            <p>当社は、特定個人情報等が適正に取り扱われるよう、継続的な改善に取り組んでまいります。</p>
            <b>5. 質問及び苦情処理の窓口</b>
            <p>当社における特定個人情報等の取り扱いに関するご質問やご苦情に関しては、下記の窓口
            にご連絡ください。</p>
                <p>お問合せ窓口<br>
            株式会社WECOMPANY 管理本部人事グループ<br>
            東京都中央区新川1-5-19 茅場町長岡ビル ４F <br>
            TEL：050-5578-2021（代表）<br>
            privacy@wecompany.co.jp <br>
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