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
    <link rel="stylesheet" href="{{ asset('css/recruit.css' . Config::get('app.version'))}}">
@endsection
@section('javascripts')
    <script type="text/javascript" src="{{ asset('js/library/jquery.min.js' . Config::get('app.version')) }}"></script>
    <script type="text/javascript" src="{{ asset('js/search.min.js' . Config::get('app.version')) }}"></script>
    <script type="text/javascript" src="{{ asset('js/home.min.js' . Config::get('app.version')) }}"></script>
@endsection
@section('content')

	<div class="wrapper__sidebar animated fadeIn">
		@include('partial.sidebar')
		@include('partial.nav')
	</div>
    
	<main id="page__recruit">
		<h1 class="title">タイトル</h1>
		<nav class="check">
			<ul>
                @if (!$branchs->isEmpty())
                    @foreach ($branchs as $key => $branch)
                    <li data-id="{{ $branch->id }}"><img src="{{ asset($branch->image) }}" width="530" height="622" alt=""/></li>
                    @endforeach
                @endif
			</ul>
		</nav>

        @php $recruits = $recruits->toArray(); @endphp
        @if (!$branchs->isEmpty())
        @foreach ($branchs as $key => $branch)
        @php
            $branchId = $branch->id;
            $recruitsInBranchs = array_filter($recruits, function( $item ) use ($branchId){ return $item->branch_id == $branchId; });
        @endphp
        <div class="js__toggle-item history" data-id="{{ $branch->id }}" data-collapse="{{ count($recruitsInBranchs) }}">
			<h2 class="history__title">{{ $branch->title_recruit }}</h2>
            
            @foreach ($recruitsInBranchs as $collap)
            <div class="wrapper__collapse">
                
                <a class="collapsible {{ $collap->show ? 'active' : '' }}"> 
                    <span class="collapsible__title" style="background-color: {{ $branch->color }}">
                        H{{ Carbon::parse($collap->created_at)->format('y') }}
                    </span>
                    <span class="collapsible__des">{{ $collap->title }}</span>
                </a>
                <div class="content__collapsible">
                    <div class="content__collapsible-main">
                        {!! $collap->content !!}
                    </div>
                    <a  style="background-color: {{ $branch->color }}" href="{{ Route('CONTACT_PAGE') }}" class="content__collapsible-envelope"><i class="far fa-envelope"></i></a>
                </div>
            </div>
            @endforeach
		</div>
        @endforeach
        @endif
		
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
            <p class="find">WE・COMPANY</p>
            <p>十人十色の人生と出会い</p>
        </div>    
    </footer>

@include('partial.footer')

{{-- <script>
    $(function(){
	$('.collapsible').click(function(){
    $(this).addClass('active');
    var n = $('.content').index(this);
    $('.content:eq('+ n +')').fadeToggle();
	});
})
</script> --}}
@endsection