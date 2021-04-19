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
    <link rel="stylesheet" href="{{ asset('css/about.css' . Config::get('app.version'))}}">
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
        <div class="wrapper__about-page">
            <h1>WE・COMPANY<span>とは？</span></h1>
            <p>
                ７つのバリュー<b>【Crew Ship】</b>を定めています。<br>
                組織/プロタクトの変化に合わせて価値観を定めることで <br>
                さらなる成長基盤を築きたい。<br>
                そんな強い想いを込めて、創りました。 <br>          
            </p>
            <p>
                <span>１：Owner Ship　【高い当事者意識】</span><br>
                一人ひとりが高い当事者意識を持ち続けてこそ、自走性と成長生の高い組織になる。<br>
                自らオーナーとなればやりがいは増え、適切な課題解決策を捻り出し、多くの機会を生み出せる。<br>
                受動的な人は成果を出すことができない。<br>
                自分たちの給料は自分で稼ぐスタイル <br>
            </p>
            <p>
                <span>２：Be Honest 【全てに素直であれ</span><br>
                人に対して、数字に対して、自分に対して、嘘をつかず素直に向き合っているか。<br>
                良い出来事は思い切り喜び、問題には素直に向き合って解決を目指す。<br>
                厳しい真実から目を逸らさない。私たちは、「素直」な人たちとともに働きたい。<br>
            </p>
            <p>
                <span>３：One Team 【一つのチーム】</span><br>
                個人よりも、チームとして成果をあげることが大切である。<br>
                互いの正義はぶつかりあうが、チームで成長を出し、カスタマーバリューのためにアクションすれば、<br>
                会社は必ず成長し、働く仲間（Crew）全員がしあわせになれると信じている。<br>
            </p>
            <p>
                <span>４：Suitable For Life　【人生適当】</span><br>
                様々な情報を飛び交う世界で正確に的確に的を狙ってマネージメントできる力を発揮できる様にしたい。<br>
                手を抜かず、あらゆる時代で合ったパファーマンスが出せる人になる。<br>
            </p>
            <p>
                <span>５：Rocket Speed 【最高速のアウトプット】</span><br>
                スピーディーな意識決定と行動こそが成長への最短経路であり、カスタマーバリューを最大化できる。<br>
                圧倒的な速度でプロジェクトを進めれば、結果への到達速度も上がる。<br>
                １つの100点よりも、５つの80点を作り出せる人でありたい。<br>
            </p>
            <p>
                <span>６：Nothing　Is impossible　【その気になれば出来ないことはない】</span>
                <br>
                私たちに不可能なことはない。諦めない精神・向上心を持って日々新しい挑戦をする。<br>
                同じ人間ができている。人間の可能性は無限大。誰かが立ち上がれば新しい発見はすぐそこにある。<br>
            </p>
            <p>
                <span>７：Treasure Chest　【最高の宝物】</span>
                <br>
                私たちクルーは一人ひとりの能力・スキルは違いはあるが、<br>
                どの組織・プロダクトより評価の高い人材として見られる様に <br>
                ただの箱ではなく。最高の宝箱（人材）を目指している。<br>
            </p>
            
        </div>
    </div>
    <div class="divbtntotop"><a class="btntotop">TOPへ戻る</a></div>
</div>
@include('partial.footer')


@endsection