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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
@endsection
@section('javascripts')
    <script type="text/javascript" src="{{ asset('js/library/jquery.min.js' . Config::get('app.version')) }}"></script>
    <script type="text/javascript" src="{{ asset('js/home.min.js' . Config::get('app.version')) }}"></script>
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

                    <a href="#" target="_blank" class="social__prt">
                        <i class="fal fa-print"></i>
                        <span class="share-text" onclick="window.print()">印刷する</span>
                    </a>

                </div>
                <div class="main-content-imgcont">
                    <div class="head">
                        @if($post)
                        <div class="number">
                            {{-- 123 --}}
                            <i >{{ $post->id }}</i>
                        </div>
                        @endif
                        <div class="head-title">{{$post->title}}</div>
                    </div>
                    @if ($post->image)
                    <img class="lazyload"
                        src="{{ Config::get('app.lazyload_base64') }}"
                        onerror="this.onerror=null;this.src='{{ asset(Config::get('app.image_error')) }}';"
                        data-src="{{ 
                        Route('IMAGE_RESIZE', [ 
                            'size' => 'post-thumnail-detail' , 
                            'type' => 'fit', 
                            'imagePath' => trim($post->image, '/') 
                        ]) }}"
                        alt="{{$post->title}}" width="800" height="500" />
                    @endif
                         
                    <div class="imgmes">
                        @if ($post->image_content)
                        <div class="imgmess__left">
                            <img class="lazyload"
                                src="{{ Config::get('app.lazyload_base64') }}"
                                onerror="this.onerror=null;this.src='{{ asset(Config::get('app.image_error')) }}';"
                                data-src="{{ 
                                Route('IMAGE_RESIZE', [ 
                                    'size' => 'post-thumnail-detail' , 
                                    'type' => 'fit', 
                                    'imagePath' => trim($post->image_content, '/') 
                                ]) }}"
                                alt="{{$post->title}}" />
                        </div>
                        @endif
                        <div class="mes {{ $post->image_content ? null : 'w-100' }}">
                            {!! $post->content !!} 
                        </div>
                        
                    </div>
                    <div class="imgdtl-list">
                        @if(!$galleries->isEmpty())
                        @foreach ($galleries as $key => $image)
                        <div class="img__dtl-item">
                            @if ($image->url)
                            <img class="lazyload"
                                src="{{ Config::get('app.lazyload_base64') }}"
                                onerror="this.onerror=null;this.src='{{ asset(Config::get('app.image_error')) }}';"
                                data-src="{{ 
                                Route('IMAGE_RESIZE', [ 
                                    'size' => 'post-galleries' , 
                                    'type' => 'fit', 
                                    'imagePath' => trim($image->url, '/') 
                                ]) }}"
                                alt="{{$post->title}}" />
                            @endif
                        </div>
                        @endforeach
                        @endif
                    </div>
                    {{-- /// càn query trong db ra cái dòng dữ liệu của branch tương ứng với bài viết --}}
                    {{-- /// cái $post là thể hiện của object post và sẽ có thể gọi hàm branch --}}

                    @php 
                    $objectBranch = $post->branch; /// giá trị trả ra nếu có sẽ là object tương ứng 1 row trong table branch hoặc null
                    /// xui xui mà nó null thì nó sẽ gây lỗi 
                    // nên bây giừo muốn lấy banner phải if else các keier con đà điểu 
                    @endphp
                    @if($objectBranch)
                    <img src="{{asset($objectBranch->banner)}}" alt="">
                    @endif
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
                                    <span>サイトへ</span>
                                </a>
                                <p>※スポット情報は最新の情報と異なることがあります。</p>

                            </div>
                            <div class="img__infor-right">
                                {{-- <img class="" src="{{asset('images/challenge172_info01.jpg')}}" alt=""> --}}
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.9654592629067!2d139.77945421465296!3d35.677852480195114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601889b97a48de95%3A0xfd4dbff3d72d5db7!2z5qCq5byP5Lya56S-QVNJQU5DT05TVUxUSU5H!5e0!3m2!1sja!2sjp!4v1618836266948!5m2!1sja!2sjp" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                    <!--footer-->
                    <footer class="footer">
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
                </div>
            </div>
        </div>
    </div>
</div>

@include('partial.footer')
@endsection