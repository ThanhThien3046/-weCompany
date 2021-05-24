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
    <script type="text/javascript" src="{{ asset('js/home.min.js' . Config::get('app.version')) }}"></script>
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
                            
                            @foreach ($branchs as $key => $branch)

                            <article class="wechild__news">
                                <header class="wechild__news-banner">
                                    <h4> <img src="{{ asset($branch->banner) }}" /> </h4>
                                </header>
                                <div>
                                    <div>
                                        <div class="wechild__news-des">
                                            {{ $branch->excerpt }}
                                        </div>
                                        @if($branch->background)
                                        <div class="wechild__news-detail">
                                            
                                            <img class="lazyload"
                                                src="{{ Config::get('app.lazyload_base64') }}"
                                                onerror="this.onerror=null;this.src='{{ asset(Config::get('app.image_error')) }}';"
                                                data-src="{{ 
                                                Route('IMAGE_RESIZE', [ 
                                                    'size' => 'branch-thumnail' , 
                                                    'type' => 'fit', 
                                                    'imagePath' => trim($branch->background, '/') 
                                                ]) }}"
                                                alt="{{ $branch->title }}" width="800" height="300" />
                                        </div>
                                        @endif
                                        <div class="wechild__news-des">
                                            {!! $branch->content !!}
                                        </div>
                                    </div>
                                    <div class="div_text">
                                        <p>関連記事リンク</p>
                                    </div>
                                    <div class="main__list" id="js__format-height-article">
                                        @php $posts = $branch->posts()->orderBy('id', 'DESC')->take(3)->get() @endphp

                                        
                                        @if(!$posts->isEmpty())
                                        @foreach ($posts as $key => $post)
                                        <article class="article article__default">
                                            <div class="article__wrapper">
                                                <span class="article__challenge">
                                                <i style="background-color: {{ $branch->color }}"
                                                    class="article__challenge-number">
                                                        {{ $post->id }}
                                                    </i>
                                                </span>
						    
						    <a class="article__link-img" href="{{ Route('DETAIL_PAGE', [ 'id' => $post->id ]) }}">
                                                    <img class="lazyload"
                                                            src="{{ Config::get('app.lazyload_base64') }}"
                                                            onerror="this.onerror=null;this.src='{{ asset(Config::get('app.image_error')) }}';"
                                                            data-src="{{ Route('IMAGE_RESIZE', [ 'size' => 'medium' , 'type' => 'fit', 'imagePath' => trim($post->image, '/') ]) }}"
                                                            alt="" width="300" height="300"/>
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
                                
                            </article>
                            @endforeach

                            <footer class="fpic">
                                <a href="/" class="ftimage" id="js__back-to-top">サイトTOP</a>
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
