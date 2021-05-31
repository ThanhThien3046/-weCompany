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
    <link type="text/css" rel="stylesheet" href="{{ asset('css/lightgallery.css' . Config::get('app.version')) }}" />
@endsection
@section('javascripts')
    <script type="text/javascript" src="{{ asset('js/lightgallery.min.js' . Config::get('app.version')) }}"></script>
    <script type="text/javascript">
        lightGallery(document.getElementById('lightgallery')); 
    </script>
    <script type="text/javascript" src="{{ asset('js/library/jquery.min.js' . Config::get('app.version')) }}"></script>
    <script type="text/javascript" src="{{ asset('js/home.min.js' . Config::get('app.version')) }}"></script>
    <script type="text/javascript" src="{{ asset('js/search.js' . Config::get('app.version')) }}"></script>
    {{-- <div id="fb-root"></div> --}}
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v10.0" nonce="KUCj7roA"></script>
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
                    
                    <div class="fb-share-button" data-href="https://wecompany.co.jp/detail/{{$post->id}}" data-layout="button" data-size="small">
                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwecompany.co.jp%2Fdetail%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">シェア</a>
                    </div>
                
                    <a href="https://twitter.com/intent/tweet?url=https%3A%2F%2Fparse.com" rel="noopener" target="_blank" class="social__wt">
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
                        @php

                            $branchOfPost = DB::table('branchs')->where('id',$post->branch_id )->first();
                            
                            $background = "background-color: " . $branchOfPost->color;
                        @endphp
                        <div style="{{$background}}" class="number">
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
                    <div  id="lightgallery" class="imgdtl-list">
                        @if(!$galleries->isEmpty())
                        @foreach ($galleries as $key => $image)
                        @if ($image->url)
                        <a class="img__dtl-item" href="{{ asset($image->url) }}">
                            <img 
                            src="{{ Route('IMAGE_RESIZE', [ 
                                'size' => 'post-galleries' , 
                                'type' => 'fit', 
                                'imagePath' => trim($image->url, '/') 
                            ]) }}"
                            onerror="this.onerror=null;this.src='{{ asset(Config::get('app.image_error')) }}';"
                            data-src="{{ asset($image->url) }}"
                            alt="{{$post->title}}" />
                        </a>
                        
                        @endif
                        @endforeach
                        @endif
                    </div>

                    @php 
                    $objectBranch = $post->branch;                   
		       @endphp
                    @if($objectBranch)
                    <img src="{{asset($objectBranch->banner)}}" alt="">
                    @endif
                    <div class="info">
                        <p style="font-family: 'Sawarabi Mincho', sans-serif;">Find Information</p>
                        <div class="info-txtimg">
                            <div class="info-text">
                                {{-- <h4>東京国立近代美術館（MOMAT)</h4> --}}
                                <p>
				［住所］{{$objectBranch->address}} <br>
				［電話番号］{{$objectBranch->phone}} <br>
				［時間］{{$objectBranch->time}} <br>
				［休館日］年末年始　<br>
  				 ※独自の企業カレンダー <br>
				［最寄駅からのアクセス］東京メトロ <br>
  				 ■茅場町駅 <br>
 				 └A3出口：徒歩５分                                
				</p>
                                <a href="https://wecompany.co.jp/">https://wecompany.co.jp/</a><br>
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
                            {{-- class="social-footer-item social-footer-btn" --}}

                            {{-- <a href="" > --}}
                                

                            <span href="" class="sharee">
                                <hr size="3px" width="150px" color="red" class="shareetop">
                                このページもシェアする
                                <hr size="3px" width="150px" color="red" class="shareebottom">
                            </span>
                                
                                
                            {{-- </a> --}}
                        </div>
                        <a class="btntotop" id="js__back-to-top">TOPへ戻る</a>
                        <div class="fttext">
                            <p>あなたもチャレンジ </p>
                            <p class="find">WE・COMPANY</p>
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