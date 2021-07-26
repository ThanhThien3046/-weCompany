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
    <link rel="stylesheet" href="{{ asset('css/policy.css' . Config::get('app.version'))}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet">
@endsection
@section('javascripts')
    <script type="text/javascript" src="{{ asset('js/library/jquery.min.js' . Config::get('app.version')) }}"></script>
	<script type="text/javascript" src="{{ asset('js/home.min.js' . Config::get('app.version')) }}"></script>
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
            <p>あなたもチャレンジ</p> --}}
        </div>
        <div id="js__homeslider" class="homeslider__wrapper lazyload">
            <!--slide contents-->
            <div class="homeslider__item slide1">
            </div>

            <div class="homeslider__item slide2">
            </div>

            <div class="homeslider__item slide3" >
            </div>

            <div class="homeslider__item slide4" >
            </div>

            {{-- <div class="homeslider__item slide5" >
            </div> --}}

            <div class="homeslider__item slide6" >
            </div>

            {{-- <div class="homeslider__item slide7" >
            </div> --}}

            {{-- <div class="homeslider__item slide8" >
            </div> --}}

            <div class="homeslider__item slide9" >
            </div>

            {{-- <div class="homeslider__item slide10" >
            </div> --}}

            <div class="homeslider__item slide11" >
            </div>

        </div>
    </div>
    <div class="content__main homepage">
        <div class="wrapper__about-page">
           
            <h2>個人情報保護方針</h2>
            <span>PRIVACY POLICY</span>
            <p>私どもは以下の事項を常に念頭に置き、お客様の個人情報の保護に努めてまいります。<br>
            株式会社WECOMPANY（以下、WECOMPANYとする。）は「Fulfill The Needs（要求を満たす）」を
            経営理念に掲げ、健全な事業活動の維持のため、常に「お客様の視点」に立ち、ヒューマンスキル
            の高い人材、より良い製品やサービスを提供し続けることが当社にとっての最大の目標であり、
            使命と考えています。<br>
            「要求を満たす」上で必要とされるお客様の個人情報はお客様自身の意思によりあらかじめ
            特定した範囲内で利用するために委託されたものであり、その個人情報を安全に管理する
            ことが、WECOMPANYに求められる課題であると認識しております。</p>
            <b>1.（個人情報の利用目的）</b>
            <p>WECOMPANYは、利用目的をできる限り特定し、あらかじめご本人の同意を得た場合、及び法令により定められている場合を除き、明示または公表した利用目的の範囲内で個人情報（特定の個人を識別できるもの、以下同様。）を取り扱います。<br>
                また、目的外利用を行わないために、適切な管理措置を講じます。</p>
            <b>2.（個人情報の取得）</b>
            <p>WECOMPANYは、あらかじめ利用目的を明示し、同意を得たうえで個人情報を取得します。
        なお、WECOMPANYは、お取引やお問い合わせに関する内容を記録あるいは録音させて
        いただく場合、取得した情報はご本人のご要望に適切かつ迅速に対応するためにのみ
        取り扱います。</p>
            <b>3.（個人情報の提供）</b>
            <p>WECOMPANYは、法令により例外として認められた場合を除き、本人の
        同意を得ることなく取得した個人情報を第三者に提供いたしません。なお、WECOMPANY
        では、オプトアウト制度（個人情報の保護に関する法律第23条第2項）を利用して、ご本人の
        認識なく個人情報を第三者に提供することはいたしません。
        （個人情報保護に関する法令の遵守）WECOMPANYでは、個人情報の取扱いにおいて、個人
        情報保護に関する法令、関係省庁ガイドライン、及び日本工業規格JIS Q 15001 2006、並びに
        本方針を遵守いたします。</p>
            <b>4.（安全管理措置）</b>
            <p>個人情報への不正アクセス、個人情報の漏洩、滅失、およびき損など個人情報に対するリスクを
        認識し、リスク防止のための是正および予防措置、社内基準や責任体制を確立し、合理的で適正
        な安全対策を講じます。また、万一発生した当該事象に対しては速やかな是正処置を実施します。</p>
            <b>5.（苦情及び相談への対応）</b>
            <p>WECOMPANYは、取り扱う個人情報につき、ご本人からの苦情及び相談に対し迅速かつ適切に
        取組む為の社内体制を整備します。</p>
            <b>6.（マネジメントシステムの継続的改善）</b>
            <p>WECOMPANYは、お預かりした個人情報を適切に取り扱うために、マネジメントシステムの策定、
        内部規程の整備、従業員等の教育および適正な内部監査の実施等を通じて、本方針の見直しを
        含めた社内体制の継続的強化・改善に努めます。なおマネジメントシステムは、今後の情勢の
        変化に沿って、継続的に改善いたします。<br>
        本方針は、全ての社員等に配付して周知させるとともに、本方針を一般の人が入手できるように
        ホームページに掲載いたします。</p>
            <b>7.（法令、規範の遵守と見直し）</b>
            <p>個人情報の取扱いに関して、個人情報の保護に関する法令、国が定める指針その他の規範を遵守
        するとともに、当社の策定する個人情報保護マネジメントシステムをこれらの法令、国が定める指針
        その他の規範に適合させます。</p>
            <p>【お問い合わせ窓口】株式会社WECOMPANY 管理本部人事グループ<br>
        東京都中央区新川1-5-19 茅場町長岡ビル ４F <br>
        TEL：050-5578-2021（代表）<br>
        privacy@wecompany.co.jp <br>
        制定年月日　平成30年2月26日 <br>
        最終改訂年月日 令和2年8月1日 <br>
        株式会社WECOMPANY <br>
        代表取締役　長谷川　美佳</p>
        
        



        </div>
    </div>
    <div class="divbtntotop" id="js__back-to-top"><a class="btntotop">TOPへ戻る</a></div>
    
</div>
@include('partial.footer')


@endsection