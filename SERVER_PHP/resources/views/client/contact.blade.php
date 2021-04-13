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

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/animate.min.css' . Config::get('app.version'))}}">
    <link rel="stylesheet" href="{{ asset('css/home.css' . Config::get('app.version'))}}">
    <link rel="stylesheet" href="{{ asset('css/contact.css' . Config::get('app.version'))}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">
@endsection
@section('javascripts')
    <script type="text/javascript" src="{{ asset('js/library/jquery.min.js' . Config::get('app.version')) }}"></script>
	<script type="text/javascript" src="{{ asset('js/home.js' . Config::get('app.version')) }}"></script>
    <script type="text/javascript" src="{{ asset('js/library/jquery.validate.min.js' . Config::get('app.version')) }}"></script>
    <script type="text/javascript" src="{{ asset('js/validate.contact.js' . Config::get('app.version')) }}"></script>
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
            <div class="container form-contact">
                <div class="row">
                    <div class="col-12 service">
                        <h1 class="service__title">
                            お問い合わせ
                        </h1>
                        <form class="js-validate-form" action="{{ Route('MAIL_CONTACT') }}" method="post">
                            {!! csrf_field() !!}
                            @if (Session::has(Config::get('constant.SAVE_ERROR')))
                            <div class="alert alert-danger">
                                {{ Session::get(Config::get('constant.SAVE_ERROR')) }}
                            </div>
                            @elseif (Session::has(Config::get('constant.SAVE_SUCCESS')))
                            <div class="alert alert-success">
                                success!
                            </div>
                            @endif
                            @if(!empty($errors->all()))
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-warning">
                                    {{ $error }}
                                </div>
                                @endforeach
                            @endif
                            <div class="form-input">
                                <label> お問い合わせ内容 </label>
                                <textarea name="message" onClick="this.setSelectionRange(0, this.value.length)">{{ old('message' ) }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-input">
                                        <label> 氏名(姓) <i>✵</i></label>
                                        <input name="first_name" value="{{ old('first_name' ) }}" onClick="this.setSelectionRange(0, this.value.length)" type="text" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-input">
                                        <label> 氏名(名) <i>✵</i></label>
                                        <input name="last_name" value="{{ old('last_name' ) }}" type="text" onClick="this.setSelectionRange(0, this.value.length)" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-input">
                                <label> 会社名 </label>
                                <input  name="company"  value="{{ old('company' ) }}" type="text" autocapitalize="off" onClick="this.setSelectionRange(0, this.value.length)"/>
                            </div>
                            <div class="form-input">
                                <label> 部署・役職名 </label>
                                <input  name="job_name"  value="{{ old('job_name' ) }}" type="text" autocapitalize="off" onClick="this.setSelectionRange(0, this.value.length)"/>
                            </div>
                            <div class="form-input">
                                <label> メールアドレス<i>✵</i></label>
                                <input  name="email"  value="{{ old('email' ) }}" type="text" autocapitalize="off" onClick="this.setSelectionRange(0, this.value.length)"/>
                            </div>
                            <div class="form-input">
                                <label> 電話番号 </label>
                                <input name="mobile" value="{{ old('mobile' ) }}"  type="text" onClick="this.setSelectionRange(0, this.value.length)"/>
                            </div>
                            <div class="form-input">
                                <label> FAX番号 </label>
                                <input name="fax" value="{{ old('fax' ) }}"  type="text" onClick="this.setSelectionRange(0, this.value.length)"/>
                            </div>
                            <p>個人情報の取り扱いに同意しますか？</p>

                            <div class="form-input cus_checkbox">
                                <label class="container">はい
                                    <input type="checkbox" name="agree">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="btn-send-mail-contact">個人情報取り扱いに同意して進む</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection