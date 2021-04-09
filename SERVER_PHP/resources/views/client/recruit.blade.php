@extends('layout.index')

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
    <link rel="preload" as="style" href="{{ asset('css/search.css' . Config::get('app.version'))}}">
@endsection
@section('stylesheets')	
	<link rel="stylesheet" href="{{ asset('css/animate.min.css' . Config::get('app.version'))}}">
	<link rel="stylesheet" href="{{ asset('css/styles.css' . Config::get('app.version'))}}">
	<link rel="stylesheet" href="{{ asset('css/home.css' . Config::get('app.version'))}}">
	<link rel="stylesheet" href="{{ asset('css/search.css' . Config::get('app.version'))}}">
@endsection
@section('javascripts')
    <script type="text/javascript" src="{{ asset('js/library/jquery.min.js' . Config::get('app.version')) }}"></script>
    <script type="text/javascript" src="{{ asset('js/search.js' . Config::get('app.version')) }}"></script>
@endsection
@section('content')

	<div class="wrapper__sidebar animated fadeIn">
		@include('partial.sidebar')
		@include('partial.nav')
	</div>
    

	<main >
		<h1 class="title">タイトル</h1>
		<nav class="check">
			<ul>
			<li><img src="images/wehomes.png" width="530" height="622" alt=""/></li>
			<li><img src="images/werentcar.png" width="530" height="622" alt=""/></li>
			<li><img src="images/wefarm.png" width="530" height="622" alt=""/></li>
			<li><img src="images/wea.png" width="530" height="622" alt=""/></li>
			<li><img src="images/weB.png" width="530" height="622" alt=""/></li>
			<li><img src="images/weconsulting.png" width="530" height="622" alt=""/></li>
			<li><img src="images/wejob.png" width="530" height="622" alt=""/></li>
			<li><img src="images/weparlor.png" width="530" height="622" alt=""/></li>
			<li><img src="images/weD.png" width="530" height="622" alt=""/></li>
			<li><img src="images/wemusic.png" width="530" height="622" alt=""/></li>
			</ul>
		</nav>

        @php
            $recruits = Config::get('recruit');
        @endphp
        @foreach ($recruits as $k => $recruit)
        <div class="js__toggle-item history {{ $recruit['class'] }}">
			<h2>{{ $recruit['title'] }}</h2>
            @foreach ($recruit['collap'] as $k => $collap)
            <div class="wrapper__collapse">
                <a class="collapsible {{ $collap['show'] ? 'active' : '' }}">{{ $collap['des'] }}</a>
                <div class="content__collapsible">{!!  $collap['des'] . $collap['content'] !!}</div>
            </div>
            @endforeach
		</div>
        @endforeach
		
	</main>

    <!--footer-->
    <footer class="footer mt-40">
        <div class="social-footer">
            <a href="#" class="social-footer-item roundbtn-fb">
                <i class="fab fa-facebook-f"></i>
            </a>
            
            <a href="#" class="social-footer-item roundbtn-tw">
                <i class="fab fa-twitter"></i>
            </a>

            <a href="#" class="social-footer-item roundbtn-insta">
                <i class="fab fa-instagram"></i>
            </a>

            <a href="#" class="social-footer-item roundbtn-youtube">
                <i class="fab fa-youtube"></i>
            </a>
            <a href="" class="social-footer-item social-footer-btn">このページもシャアする</a>
        </div>
        <a class="btntotop" id="js__back-to-top">TOPへ戻る</a>
        <div class="fttext">
            <p>あなたもチャレンジ </p>
            <p class="find">Find my WE・COMPANY</p>
            <p>十人十色の人生と出会い</p>
        </div>    
    </footer>
@include('partial.footer')

@endsection