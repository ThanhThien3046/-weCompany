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
    <link rel="preload" as="style" href="{{ asset('css/post-detail.css' . Config::get('app.version'))}}">
@endsection
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/animate.min.css' . Config::get('app.version'))}}">
    <link rel="stylesheet" href="{{ asset('css/home.css' . Config::get('app.version'))}}">
    <link rel="stylesheet" href="{{ asset('css/post-detail.css' . Config::get('app.version'))}}">
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

    <div class="content__main">
        <div class="container__wrapper">

            <div class="wrapper__head">
                <a href="{{ Route("HOME_PAGE") }}" class="link__homepage-head">
                    {{ Config::get('app.name') }}
                </a>
                <div class="social">
                    <a href="{{ Route('HOME_PAGE') }}" target="_blank" class="social__fb">
                        <i class="fab fa-facebook-square"></i>
                        <span class="share-text">Share</span>
                    </a>
                    <a href="{{ Route('HOME_PAGE') }}" target="_blank" class="social__wt">
                        <i class="fab fa-twitter-square"></i>
                        <span class="share-text">ツイート</span>
                    </a>
                    <span class="divider"></span>
                    <a href="{{ Route('HOME_PAGE') }}" target="_blank" class="social__prt">
                        <i class="fal fa-print"></i>
                        <span class="share-text" onclick="window.print()">印刷する</span>
                    </a>
                </div>
            </div>
            <div class="content__detail">
            </div>
        </div>
    </div>
</div>
@include('partial.footer')

@endsection
