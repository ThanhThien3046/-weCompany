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

	<main>
		<h1 class="title">WE グループの沿革</h1>
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
		<div class="js__toggle-item history homes">
			<h2>株式会社WE・HOMES</h2>
			<a href="http://thanhthien.jp/history">
				<ul class="last_child">
					<li><span>21</span></li>
					<li>2021</li>
					<li><i class="fas fa-arrow-right"></i></li>
				</ul>
			</a>
			<a href="http://thanhthien.jp/history"><ul>
				<li><span>10</span></li>
				<li>2020</li>
				<li><i class="fas fa-arrow-right"></i></li>
			</ul></a>
			<a href=""><ul class="last_child">
				<li><span>15</span></li>
				<li>2019</li>
				<li><i class="fas fa-arrow-right"></i></li>
			</ul></a>
			<a href="http://thanhthien.jp/history"><ul>
				<li><span>9</span></li>
				<li>2018</li>
				<li><i class="fas fa-arrow-right"></i></li>
			</ul></a>
			<a href="http://thanhthien.jp/history"><ul class="last_child">
				<li><span>19</span></li>
				<li>2017</li>
				<li><i class="fas fa-arrow-right"></i></li>
			</ul></a>
		</div>
		<div class="js__toggle-item history rentcar">
			<h2>株式会社WE・RENTCAR</h2>
			<a href="http://thanhthien.jp/history"><ul class="last_child">
				<li><span>21</span></li>
				<li>2021</li>
				<li><i class="fas fa-arrow-right"></i></li>
			</ul></a>
			<a href="http://thanhthien.jp/history"><ul>
				<li><span>10</span></li>
				<li>2020</li>
				<li><i class="fas fa-arrow-right"></i></li>
			</ul></a>
			<a href="http://thanhthien.jp/history"><ul class="last_child">
				<li><span>15</span></li>
				<li>2019</li>
				<li><i class="fas fa-arrow-right"></i></li>
			</ul></a>
			<a href="http://thanhthien.jp/history"><ul>
				<li><span>9</span></li>
				<li>2018</li>
				<li><i class="fas fa-arrow-right"></i></li>
			</ul></a>
			<a href="http://thanhthien.jp/history"><ul class="last_child">
				<li><span>19</span></li>
				<li>2017</li>
				<li><i class="fas fa-arrow-right"></i></li>
			</ul></a>
		</div>
	</main>

@include('partial.footer')

@endsection