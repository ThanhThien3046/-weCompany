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
            <h1>We Company</h1>
            <p>あなたもチャレンジ</p>
        </div>
        <div id="js__homeslider" class="homeslider__wrapper lazyload">
            <!--slide contents-->
            <div class="homeslider__item" 
            style="background-image: url('{{ asset('images/bg2.jpg') }}');"
            data-src-mobile="{{ asset('images/sptop01_2004_02.jpeg') }}"></div>
            <div class="homeslider__item" 
            style="background-image: url('{{ asset('images/bg3.jpg') }}');"
            data-src-mobile="{{ asset('images/sptop02_2004_02.jpeg') }}"></div>
            <div class="homeslider__item" 
            style="background-image: url('{{ asset('images/bg4.jpg') }}');"
            data-src-mobile="{{ asset('images/sptop01_2004_02.jpeg') }}"></div>
            <div class="homeslider__item homeslider__item-video">
                <video autoplay muted loop="true">
                    {{-- <source src="video.webm" type="video/webm" />  --}}
                    <source src="{{ asset('/video/video-homepage.mp4') }}" type="video/mp4" />
                </video>
            </div>
        </div>
    </div>
    <div class="content__main homepage">
        <div class="wrapper__about-page">
           
            <h2>WECOMPANYの個人情報取り扱い</h2>
            <span>PERSONAL INFORMATION</span>
            <p>WECOMPANYは個人情報保護方針に基づき、以下の方法で個人情報を取り扱います。</p>
            <b>●個人情報の利用目的について</b>
            <p>WECOMPANYはお客様の個人情報を以下の利用目的の範囲内で利用させて頂きます。<br>
        ・お客様と当社との間で締結した契約の履行のため<br>
        ・お客様に対する催物等の開催のご案内の送付のため<br>
        ・当社の人材募集等に応募された方との間での採用、紹介等に係る相談、調整のため<br>
        ・面談時の参考資料として使用するため<br>
        ・お客様との各種お問合せに対応するため<br>
        ・その他、お客様にあらかじめ明示し、ご同意頂いた利用目的<br>
        なお、お客様から個人情報をご提供いただく際に明示した目的の範囲を超えてお客様の<br>
        個人情報を利用する必要が生じた場合には、事前に当社ホームページにて掲載いたします。</p>
            
            <b>●個人情報の外部委託</b>
            <p>
        WECOMPANYは、お預かりした個人情報の処理を利用目的の範囲内で第三者に委託する
        場合には、委託先に対し、十分な個人情報のセキュリティ水準があることを確認の上選定し、
        契約等を通じて、必要かつ適切な監督を行います。</p>
            
            <b>●未成年者の個人情報</b>
            <p>WECOMPANYは、18歳未満のお子様から個人情報を取得する可能性がある場合には、
        保護者の同意をいただきご提供下さるよう明示した上で取得いたします。なお未成年者の
        個人情報の取り扱いに関しては、特別の配慮を行います。</p>
            
            <b>●個人情報に関する管理者</b>
            <p>WECOMPANYは、個人情報保護を統括管理する責務を負う者を、【個人情報保護管理者】として、以下の通り定めます。<br>
            【個人情報保護管理者】 株式会社WECOMPANY　総務部<br>
            担当 長谷川　法徳<br>
            </p>
            
            <b>●個人情報保護に関するお問い合わせ窓口及び苦情の申し出先</b>
            <p>個人情報に関するお問い合わせ、苦情に関しては、個人情報に関する(お問合わせ窓口)にご連絡ください。
        （お問合せ窓口）<br>
        ※個人情報保護に関するお問合せは下記の窓口にお問合せ下さい。<br>
        【お問い合わせ窓口】 株式会社WECOMPANY <br>
        担当 長谷川　法徳 <br> 
        TEL：050-5578-2021 <br>
        電子メール：privacy@wecompany.co.jp </p>
                
            <b>●開示等に関する手続きについて</b>
            <p>WECOMPANYは、保有するお客様ご自身の個人情報について、利用目的の通知・開示・訂正・削除・利用停止（以下、開示等という）の求めがあった場合には、合理的な期間内にて対応させていただきます。</p>
            
            <b>◆開示等の請求手続き</b>
            <p>1.個人情報の開示等の請求をできる方<br>
            ・ご本人<br>
            ・代理人（親権者等の法定代理人及びご本人より委託された方）<br>
            2.開示等を希望される場合 <br>
            当社総務部に電話にて開示等の手続きを申請し、下記【必要書類】をお持ちの上、当社総務部までお越しください。<br>
            必要書類】<br>
            本人の場合・・・下記書類を1通<br>
        ・運転免許証<br>
        ・旅券（パスポート）<br>
        ・年金手帳証<br>
        ・写真付住民基本台帳<br>
        ・外国人登録証明書<br>
        ・印鑑登録証明書(３ヶ月以内に発行で当該印鑑を押印) <br>
        ■代理人の場合・・・上記?～?（本人＋代理人）＋ 委任状 <br>
        なお、開示等を請求できる代理人は以下とする。 <br>
        ・未成年者又は成年被後見人の法定代理人 <br>
        ・開示等の求めをすることにつき本人が委任した代理人 <br>
                </p>
            <p>3.開示、利用目的の通知のご請求に関する手数料</p>
            <p>個人情報の開示及び利用目的の通知につきましては、ご請求毎に手数料として\1,000円（税込）を徴収させていただきます。なお、ご請求いただいた当該の個人情報が無かった場合、もしくは個人情報を特定できなかった場合には、あらかじめお電話にてその旨をお伝えいたします。<br>
            （不開示等の理由）<br>
            ・所定の請求書類に不備があった場合 ・当社の保有個人データ（開示対象個人情報）に該当しない場合 <br>
            ・ご本人又は第三者の生命、身体、財産その他の権利利益を害するおそれがある場合 <br>
            ・当社の業務の適正な実施に著しい支障を及ぼすおそれがある場合 <br>
            ・他の法令に違反することとなる場合 <br>
            </p>
            <p>4.個人情報保護に関するお問合せ窓口</p>
            <p>株式会社WECOMPANY <br>
            住所：東京都中央区新川1-5-19 茅場町長岡ビル４F <br>
            TEL：050-5578-2021 <br>
            電子メール：privacy@wecompany.co.jp <br>
            受付時間： 9:00～12:00 13:00～17:00 
            </p>
            <b>その他</b>
            <p>1.当社がご提供する一部のサービスでは、お客様からの個人情報をご提供いただけない場合には、利用できないものがありますので、あらかじめ ご了承ください。</p>
            <p>2.当社ホームページにリンクされている他社のウェブ・サイトにおけるお客様の個人情報の安全確保については、当社が責任を負うことはできません。</p>
            <p>3.通常、お客様は、個人情報を開示することなく当社のウェブサイトを訪れることができ、ウェブサイトを参照しただけでは、お客様の個人情報が収集されることはありません。<br>
        注意事項 <br>
        ・開示等の請求ができるのは、原則、当社にて保有している個人データの本人に限ります。<br>
        ・諸事情により個人データ本人が開示等の請求に来社できない場合、代理人による請求も受付けます。その際は、当社総務部へのご連絡時にその旨をお伝えください。尚、代理人による請求の場合は、個人データ本人の委任状及び代理人の本人確認ができる（住民票やパスポート等）公的書類が必要になります。<br>
        ・利用目的の通知及び開示の請求に伴う手数料の支払いがない場合は利用目的の通知及び開示はできません。<br>
        ・個人データの確認照合手続きの関係上、開示等にある程度の時間お待ちいただく場合もありますので、あらかじめご了承ください。<br>
        ・調査の結果、対象となる個人データを保有していない場合であっても所定の手数料はお返しできません。<br>
        ・本人または第三者の生命、身体または財産その他の権利利益を害する恐れのある場合、法令に違反することとなる場合は、全部または一部を不開示とさせていただきます。この場合も所定の手数料はお返しできません。<br>
        ・この開示等の手続きで当社が受領した個人情報は、本人確認、保有個人データとの照合、本人との開示等手続きに必要な範囲で利用いたします。尚、申請書類は返却いたしません。<br>
        私どもは以下の事項を常に念頭に置き、お客様の個人情報の保護に努めてまいります。<br>
        株式会社WECOMPANY（以下、WECOMPANYとする。）は「Fulfill The Needs（要求を満たす）」を経営理念に掲げ、健全な事業活動の維持のため、常に「お客様の視点」に立ち、ヒューマンスキルの高い人材、より良い製品やサービスを提供し続けることが当社にとっての最大の目標であり、使命と考えています。<br>
        「要求を満たす」上で必要とされるお客様の個人情報はお客様自身の意思によりあらかじめ特定した範囲内で利用するために委託されたものであり、その個人情報を安全に管理することが、WECOMPANYに求められる課題であると認識しております。
        </p>
        <b>1.（個人情報の利用目的）</b>
            <p>WECOMPANYは、利用目的をできる限り特定し、あらかじめご本人の同意を得た場合、及び法令により定められている場合を除き、明示または公表した利用目的の範囲内で個人情報（特定の個人を識別できるもの、以下同様。）を取り扱います。</p>
            <b>2.（個人情報の取得）</b>
            <p>WECOMPANYは、あらかじめ利用目的を明示し、同意を得たうえで個人情報を取得します。なお、WECOMPANYは、お取引やお問い合わせに関する内容を記録あるいは録音させていただく場合、取得した情報はご本人のご要望に適切かつ迅速に対応するためにのみ取り扱います。</p>
            <b>3.（個人情報の提供）</b>
            <p>WECOMPANYは、法令により例外として認められた場合を除き、本人の同意を得ることなく取得した個人情報を第三者に提供いたしません。なお、WECOMPANYでは、オプトアウト制度（個人情報の保護に関する法律第23条第2項）を利用して、ご本人の認識なく個人情報を第三者に提供することはいたしません。<br>
        （個人情報保護に関する法令の遵守）WECOMPANYでは、個人情報の取扱いにおいて、個人情報保護に関する法令、関係省庁ガイドライン、及び日本工業規格JIS Q 15001 2006、並びに本方針を遵守いたします。
        </p>
            <b>4.（安全管理措置）</b>
            <p>WECOMPANYは、お預かりした個人情報を利用目的の範囲内で正確かつ最新の内容に保つとともに、不正アクセス、改ざん、漏えい等から守るべく、必要かつ適切な安全管理措置を講じます。</p>
            <b>5.（苦情及び相談への対応）</b>
            <p>WECOMPANYは、取り扱う個人情報につき、ご本人からの苦情及び相談に対し迅速かつ適切に取組む為の社内体制を整備します。</p>
            <b>6.（マネジメントシステムの継続的改善）</b>
            <p>WECOMPANYは、お預かりした個人情報を適切に取り扱うために、マネジメントシステムの策定、内部規程の整備、従業員等の教育および適正な内部監査の実施等を通じて、本方針の見直しを含めた社内体制の継続的強化・改善に努めます。なおマネジメントシステムは、今後の情勢の変化に沿って、継続的に改善いたします。</p>
            <p>本方針は、全ての社員等に配付して周知させるとともに、本方針を一般の人が入手できるようにホームページに掲載いたします。<br>
        株式会社WECOMPANY 代表取締役社長 長谷川　美佳（改定 2020年8月1日）
        </p>




        </div>
    </div>
    <div class="divbtntotop" id="js__back-to-top"><a class="btntotop">TOPへ戻る</a></div>
    
</div>
@include('partial.footer')


@endsection