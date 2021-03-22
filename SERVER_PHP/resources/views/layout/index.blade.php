<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="content-language" content="vi" />
    <meta name="robots" content="index, follow" />
    <title> @yield('title') </title>
    <meta name="description" content="@yield('description')">

    @yield('meta-seo')

    <script async='async' defer='defer' src='{{ asset('js/library/lazysizes.min.js' . Config::get('app.version')) }}'></script>
    
    <link rel="preload" as="style" href="{{ asset('css/app.min.css' . Config::get('app.version'))}}">
    <link rel="preload" as="style" href="{{ asset('css/awesome.min.css' . Config::get('app.version'))}}">
    @yield('preload')
    
    {{-- end preload  --}}

    <link rel="alternate" type="application/rss+xml" title="{{ Config::get("app.alternate_name") }}" href="" />

    <link rel="icon" type="image/png" href="{{ asset('favicon.ico' . Config::get('app.version')) }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/favicon/apple-icon-57x57.png' . Config::get('app.version')) }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/favicon/apple-icon-60x60.png' . Config::get('app.version')) }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/favicon/apple-icon-72x72.png' . Config::get('app.version')) }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/favicon/apple-icon-76x76.png' . Config::get('app.version')) }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/favicon/apple-icon-114x114.png' . Config::get('app.version')) }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/favicon/apple-icon-120x120.png' . Config::get('app.version')) }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/favicon/apple-icon-144x144.png' . Config::get('app.version')) }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/favicon/apple-icon-152x152.png' . Config::get('app.version')) }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/favicon/apple-icon-180x180.png' . Config::get('app.version')) }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('/favicon/android-icon-192x192.png' . Config::get('app.version')) }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon/favicon-32x32.png' . Config::get('app.version')) }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/favicon/favicon-96x96.png' . Config::get('app.version')) }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon/favicon-16x16.png' . Config::get('app.version')) }}">
    <link rel="manifest" href="{{ asset('/favicon/manifest.json' . Config::get('app.version')) }}">
    <meta name="msapplication-TileColor" content="#62854F">
    <meta name="msapplication-TileImage" content="{{ asset('/favicon/ms-icon-144x144.png' . Config::get('app.version')) }}">
    <meta name="theme-color" content="#62854F">
    {{-- dành cho bing search --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico' . Config::get('app.version')) }}"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico' . Config::get('app.version')) }}"/>

    <link rel="stylesheet" href="{{ asset('css/app.min.css' . Config::get('app.version'))}}">
    <link rel="stylesheet" href="{{ asset('css/awesome.min.css' . Config::get('app.version'))}}">

    @yield('stylesheets')
    
</head>
<body>
    
    @yield('content')
    @yield('javascripts')
    <script type="text/javascript" src="{{ asset('/js/library/jquery.validate.min.js' . Config::get('app.version')) }}"></script>
    <script type="text/javascript" src="{{ asset('/js/client/validate.footer.contact.min.js' . Config::get('app.version')) }}"></script>
</body>
</html>