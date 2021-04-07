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
    <link rel="preload" as="style" href="{{ asset('css/detail.css' . Config::get('app.version'))}}">
@endsection
@section('stylesheets')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Mincho&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css' . Config::get('app.version'))}}">
    <link rel="stylesheet" href="{{ asset('css/home.css' . Config::get('app.version'))}}">
    <link rel="stylesheet" href="{{ asset('css/detail.css' . Config::get('app.version'))}}">
@endsection
@section('javascripts')
    <script type="text/javascript" src="{{ asset('js/library/jquery.min.js' . Config::get('app.version')) }}"></script>
    <script type="text/javascript" src="{{ asset('js/home.js' . Config::get('app.version')) }}"></script>
    <script type="text/javascript" src="{{ asset('js/search.js' . Config::get('app.version')) }}"></script>
@endsection
@section('content')

<div class="wrapper__sidebar animated fadeIn">
    @include('partial.sidebar')
    @include('partial.nav')
</div>
<div class="wrapper__content">
    <div class="wrapper" >
        <div class="main">
            <div class="main-content">
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
                        <span class="share-text">印刷する</span>
                    </a>

                </div>
                <div class="main-content-imgcont">
                    <div class="head">
                        <div class="number">
                            123
                        </div>
                        <div class="head-title">近代アートで対話を楽しもう！</div>
                    </div>
                    <img src="{{asset('images/challenge172_01.jpg')}}" alt="sdfsdfds">
                    <div class="imgmes">
                        <img src="{{asset('images/challenge172_02.jpg')}}" alt="" class="imgmes_img">
                        <p class="mes">
                            東京国立近代美術館に行って是非体験していただきたいのが「MOMATガイドスタッフによる所蔵品ガイド」。これは作品に対して何を感じたかを美術館のガイドスタッフや参加者と語り合うことで、作品に対する理解をより深めることができる鑑賞体験です。1980年代、ニューヨーク近代美術館 (MoMA)が認知心理学者とともに産み出したVTS(ヴィジュアル・シンキング・ストラテジー )という鑑賞教育の新しいメソッドを基礎として作られたもので、東京国立近代美術館の特徴になっています。彫刻や絵画のポーズを真似してみることでわかる作者が伝えたかったこと、誰かと会話することで発見できる新しい作品の見方、普段とは一味違う鑑賞、オススメです。　
                        </p>
                    </div>
                    <div class="imgdtl-list">
                        <img src="{{asset('images/challenge172_03.jpg')}}" alt="">
                        <img src="{{asset('images/challenge172_04.jpg')}}" alt="">
                    </div>
                    <img src="{{asset('images/station_takebashi.jpg')}}" alt="">
                    <div class="info">
                        <p style="font-family: 'Sawarabi Mincho', sans-serif;">Find Information</p>
                        <div class="info-txtimg">
                            <div class="info-text">
                                <h4>東京国立近代美術館（MOMAT)</h4>
                                <p>
                                    ［住所］千代田区北の丸公園 3-1 <br>
                                    ［電話番号］03-5777-8600（ハローダイヤル）
                                    ［開館時間］10:00〜17:00（金・土曜 10:00〜20:00）
                                    10月29日までの金・土曜は21：00まで　※入館は閉館 30分前まで
                                    ［ MOMATガイドスタッフによる所蔵品ガイド］毎日（休館日を除く）14:00〜15:00
                                    ［休館日］月曜（祝日の場合は開館）、展示替期間、年末年始
                                    ［最寄駅からのアクセス］東西線 竹橋駅 b1出口から徒歩 3分
                                </p>
                                <a href="#">http://www.momat.go.jp/am</a><br>
                                <a href="{{ Route('HOME_PAGE') }}" target="_blank" class="btn_map">
                                    <span>MAPをみる</span>
                                </a>
                                <p>※スポット情報は最新の情報と異なることがあります。</p>

                            </div>
                            <img src="{{asset('images/challenge172_info01.jpg')}}" alt="">
                        </div>
                    </div>
                    <!--footer-->
                    <footer class="footer">
                        <div class="social-footer">
                            <a href="#" class="roundbtn-fb">
                                <i class="fab fa-facebook-f"></i>
                            </a>

                            <a href="#" class="roundbtn-tw">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                        <p>関連タグ</p>
                        <div class="btn-footer">
                            <a href="{{ Route('HOME_PAGE') }}" target="_blank">
                                <span class="share-text">国立近代美術館</span>
                            </a>

                            <a href="{{ Route('HOME_PAGE') }}" target="_blank">
                                <span class="share-text">近代アート</span>
                            </a>

                            <a href="{{ Route('HOME_PAGE') }}" target="_blank">
                                <span class="share-text">対話によるガイド</span>
                            </a>

                            <a href="{{ Route('HOME_PAGE') }}" target="_blank">
                                <span class="share-text">健康で文化的な1日</span>
                            </a>

                            <a href="{{ Route('HOME_PAGE') }}" target="_blank">
                                <span class="share-text">東京賢くなるアクティビティ</span>
                            </a>

                            <a href="{{ Route('HOME_PAGE') }}" target="_blank">
                                <span class="share-text">最高のインドア宣言</span>
                            </a>
                        </div>

                        <div class="btn-footer">
                            <a href="{{ Route('HOME_PAGE') }}" target="_blank">
                                <span class="share-text">MOMA</span>
                            </a>

                            <a href="{{ Route('HOME_PAGE') }}" target="_blank">
                                <span class="share-text">真似できるかな</span>
                            </a>

                            <a href="{{ Route('HOME_PAGE') }}" target="_blank">
                                <span class="share-text">説明文が面白いのです</span>
                            </a>

                            <a href="{{ Route('HOME_PAGE') }}" target="_blank">
                                <span class="share-text">石原さとみさんチャレンジ</span>
                            </a>

                            <a href="{{ Route('HOME_PAGE') }}" target="_blank">
                                <span class="share-text">竹橋</span>
                            </a>

                            <a href="{{ Route('HOME_PAGE') }}" target="_blank">
                                <span class="share-text">2017年のチャレンジ</span>
                            </a>
                        </div>
                        <p>関連記事リンク</p>
                        <div class="list__img">
                            <div class="footer__pic">
                                <div class="footer-pic__wrapper">
                                    <span class="footer__num">
                                        <i>123</i>
                                    </span>
                                    <a href="#" class="footer__img">
                                        <img src="{{asset('images/challenge173_top01.jpg')}}" alt="">
                                    </a>
                                    <a href="#" class="title">
                                        <h3>江戸時代の教科書を見てみよう！</h3>
                                    </a>
                                </div>
                            </div>

                            <div class="footer__pic">
                                <div class="footer-pic__wrapper">
                                    <span class="footer__num">
                                        <i>123</i>
                                    </span>
                                    <a href="#" class="footer__img">
                                        <img src="{{asset('images/challenge173_top01.jpg')}}" alt="">
                                    </a>
                                    <a href="#" class="title">
                                        <h3>江戸時代の教科書を見てみよう！</h3>
                                    </a>
                                </div>
                            </div>

                            <div class="footer__pic">
                                <div class="footer-pic__wrapper">
                                    <span class="footer__num">
                                        <i>123</i>
                                    </span>
                                    <a href="#" class="footer__img">
                                        <img src="{{asset('images/challenge173_top01.jpg')}}" alt="">
                                    </a>
                                    <a href="#" class="title">
                                        <h3>江戸時代の教科書を見てみよう！</h3>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partial.footer')
@endsection