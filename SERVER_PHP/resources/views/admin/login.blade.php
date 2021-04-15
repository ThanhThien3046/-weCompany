<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Login Admin </title>
    {{-- <meta name="robots" content="index, follow" /> --}}
    <meta name="robots" content="noindex" />
    <meta name="googlebot" content="noindex" />

    <script async='async' defer='defer' src='{{ asset('js/library/lazysizes.min.js' . Config::get('app.version')) }}'></script>

    <meta http-equiv="content-language" content="vi" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ asset('/') }}" />
    <meta property="og:image" content="@yield('image_seo')" />
    <meta property="og:description" content="@yield('description')" />
    <meta name="description" content="@yield('description')">

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

    <link rel="stylesheet" href="{{ asset('css/admin.min.css' . Config::get('app.version'))}}">
</head>
<body>

    <div class="login-admin-page blue-gradient-rgba animated fast fadeIn">
        <div class="login-form-wrapper">
            <form class="login-form" action="{{ Route('ADMIN_POST_LOGIN') }}" method="POST" >
                {!! csrf_field() !!}
                @if (Session::has('LOGIN_ERROR'))
                <div class="alert alert-warning">
                    {{ Session::get('LOGIN_ERROR') }}
                </div>
                @endif
                @if($errors->any())
                <div class="alert alert-danger">
                    check error:
                    @if($errors->has('g-recaptcha-response'))
                        <p>{{ $errors->first('g-recaptcha-response') }}</p>
                    @endif
                    
                </div> 
                @endif
                <h1 class="title"> Welcome Admin </h1>
                <p class="domain">{{ Config::get('app.name') }}</p>
                <div class="input-group">
                    <i class="hero-icon hero-email-check-outline"></i>
                    <input name="email" ref="email" type="text" autoCorrect="off" autoCapitalize="none" class="input-control" placeholder="Email Address" />
                </div>
                @if($errors->has('email'))
                    <div class="text-danger text-left">{{ $errors->first('email') }}</div>
                @endif
                <div class="input-group">
                    <i class="hero-icon hero-lock-outline"></i>
                    <input name="password" ref="password" type="password" autoCorrect="off" autoCapitalize="none" class="input-control" placeholder="Password" />
                </div>
                @if($errors->has('password'))
                    <div class="text-danger text-left">{{ $errors->first('password') }}</div>
                @endif
                <div id="google__recaptcha" class="lazyload">
                    <!-- Google reCaptcha -->
                    <div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY')  }}"></div>
                    <!-- End Google reCaptcha -->
                </div>
                <button type="submit" class="btn btn-login aqua-gradient-rgba">
                    Log In Admin
                </button>
            </form>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js?hl=vi">
    </script>

</body>
</html>

    