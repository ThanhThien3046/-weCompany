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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">
@endsection
@section('javascripts')
    <script type="text/javascript" src="{{ asset('js/library/jquery.min.js' . Config::get('app.version')) }}"></script>
	<script type="text/javascript" src="{{ asset('js/home.min.js' . Config::get('app.version')) }}"></script>
	<script type="text/javascript" src="{{ asset('js/home.js' . Config::get('app.version')) }}"></script>	
@endsection
@section('content')
    <div class="wrapper__sidebar animated fadeIn">
        @include('partial.sidebar')
        @include('partial.nav')
    </div>
    <div class="wrapper__content">
        <div class="homeslider">
            <div class="homeslider__intro">
                {{-- <h1>We Company</h1>
                <p>縺ゅ↑縺溘ｂ繝√Ε繝ｬ繝ｳ繧ｸ</p> --}}
            </div>
            
            <div id="js__homeslider" class="homeslider__wrapper lazyload">
                <!--slide contents-->
             	<div class="homeslider__item slide1" 
                data-src-mobile="{{ asset('images/bana1.jpg') }}">
		        </div>

                <div class="homeslider__item slide2" 
                data-src-mobile="{{ asset('images/bana2.jpg') }}">
		        </div>

                <div class="homeslider__item slide3" 
                data-src-mobile="{{ asset('images/bana3.jpg') }}">
		        </div>

                <div class="homeslider__item slide4" 
                data-src-mobile="{{ asset('images/bana1.jpg') }}">
		        </div>

                {{--<div class="homeslider__item slide5" 
                data-src-mobile="{{ asset('images/bana2.jpg') }}">
		        </div>--}}

                <div class="homeslider__item slide6" 
                data-src-mobile="{{ asset('images/bana3.jpg') }}">
		        </div>

             	{{--<div class="homeslider__item slide7" 
                data-src-mobile="{{ asset('images/bana1.jpg') }}">
		        </div>--}


             	{{--<div class="homeslider__item slide8" 
                data-src-mobile="{{ asset('images/bana2.jpg') }}">
		        </div>--}}


             	<div class="homeslider__item slide9" 
                data-src-mobile="{{ asset('images/bana3.jpg') }}">
		        </div>


             	{{--<div class="homeslider__item slide10" 
                data-src-mobile="{{ asset('images/bana1.jpg') }}">
		        </div>--}}


             	<div class="homeslider__item slide11" 
                data-src-mobile="{{ asset('images/bana2.jpg') }}">
		        </div>

            </div>
        </div>
        <div class="content__main homepage">
            <div class="main__list" id="js__format-height-article">
                @if(!$posts->isEmpty())
                @foreach ($posts as $key => $post)
                <article class="article article__default d-none {{ SupportString::renderClassBlockPost($posts, $post->type, $key) }}">
                    <div class="article__wrapper">
                        <span class="article__challenge">
                            @php
 
                                $branchOfPost = DB::table('branchs')->where('id',$post->branch_id )->first();
                
                                $background = "background-color: " . $branchOfPost->color;
                            @endphp
                            <i style="{{$background}}" class="article__challenge-number">{{ $post->id }}</i>
                        </span>
                        <a class="article__link-img" href="{{ Route('DETAIL_PAGE', [ 'id' => $post->id ]) }}">
                            <img class="js__img-lazyload"
                                    src="{{ Config::get('app.lazyload_base64') }}"
                                    onerror="this.onerror=null;this.src='{{ asset(Config::get('app.image_error')) }}';"
                                    {{-- data-src="{{ Route('IMAGE_RESIZE', [ 'size' => ( $post->type == 1 ? 'medium' : 'double' ) , 'type' => 'fit', 'imagePath' => trim($post->image, '/') ]) }}" --}}
                                    {{-- data-src="{{ Route('IMAGE_RESIZE', [ 'size' => 'medium' , 'type' => 'fit', 'imagePath' => trim($post->image, '/') ]) }}" --}}
                                    data-medium="{{ Route('IMAGE_RESIZE', [ 'size' => 'medium' , 'type' => 'fit', 'imagePath' => trim($post->image, '/') ]) }}"
                                    data-double="{{ Route('IMAGE_RESIZE', [ 'size' => 'double' , 'type' => 'fit', 'imagePath' => trim($post->image_long, '/') ]) }}"
                                    alt="" width="400" height="400"/>
                        </a>
                        <a class="article__link-title">
                            <h3 class="title">{{ $post->title }}</h3>
                        </a>
                    </div>
                </article>
                @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection