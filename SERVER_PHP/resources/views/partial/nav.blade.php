<div id="js__nav" class="nav">
    <i class="fas fa-window-close nav__icon-close" id="js__close-navi"></i>
    <div class="nav__wrapper">
        <ul class="nav__top">
            <li class="nav__top-item">
                <a href="https://findmy.tokyo/tag/2396">
                    <span class="circle"><i class="far fa-bookmark"></i></span>
                    <span class="text-tag">あまじょっぱスイーツ</span>
                </a>
            </li>
            <li class="nav__top-item">
                <a href="https://findmy.tokyo/tag/2400">
                    <span class="circle"><i class="far fa-bookmark"></i></span>
                    <span class="text-tag">オールナイト露天風呂</span>
                </a>
            </li>
            <li class="nav__top-item">
                <a href="https://findmy.tokyo/tag/2347">
                    <span class="circle"><i class="far fa-bookmark"></i></span>
                    <span class="text-tag">雨の日でもアクティビティ</span>
                </a>
            </li>
        </ul>
        <ul class="nav__links">
            <li class="nav__links-item">
                <a href="https://findmy.tokyo/">TOP</a>
            </li>
            <li class="nav__links-item">
                <a href="https://findmy.tokyo/about">Find Tokyo.とは？</a>
            </li>
            <li class="nav__links-item">
                <a href="https://findmy.tokyo/gallery">広告ギャラリー</a>
            </li>
            <li class="nav__links-item">
                <a href="https://findmy.tokyo/ranking">人気のチャレンジ</a>
            </li>
            <li class="nav__links-item">
                <a href="https://findmy.tokyo/search">チャレンジ検索</a>
            </li>
            <li class="nav__links-item">
                <a href="https://findmy.tokyo/link">関連リンク</a>
            </li>
        </ul>
        <ul class="nav__history follow__links">
            <li class="nav__history-item">
                <a href="https://findmy.tokyo/tag/1928">2019年のチャレンジ</a>
            </li>
            <li class="nav__history-item">
                <a href="https://findmy.tokyo/tag/1482">2018年のチャレンジ</a>
            </li>
            <li class="nav__history-item">
                <a href="https://findmy.tokyo/tag/1121">2017年のチャレンジ</a>
            </li>
            <li class="nav__history-item">
                <a href="https://findmy.tokyo/tag/0561">2016年のチャレンジ</a>
            </li>
            <li class="nav__history-item">
                <a href="https://findmy.tokyo/2015/" rel="noopener">2015年のFind my Tokyo.</a>
            </li>
        </ul>
        <a class="nav__brand" href="https://list.findmy.tokyo/" rel="noopener">
            Find my Tokyo. List <span class="icon">@include('svg.find-list')</span>
        </a>
        <dl class="nav__search">
            <dt class="nav__search-title">
                タグ別検索
            </dt>
            <dd class="nav__searchs">
                <ul class="nav__searchs-wrapper">
                    <li class="nav__searchs-item">
                        <a href="https://findmy.tokyo/tag/0039">ダイエットは明日から</a>
                    </li>
                    <li class="nav__searchs-item">
                        <a href="https://findmy.tokyo/tag/2339">プレゼントにもオススメ</a>
                    </li>
                    <li class="nav__searchs-item">
                        <a href="https://findmy.tokyo/tag/2220">掘り出し物</a>
                    </li>
                    <li class="nav__searchs-item">
                        <a href="https://findmy.tokyo/tag/2412">フルーツぎっしりサンド</a>
                    </li>
                </ul>
            </dd>
        </dl>
        <div class="nav__metro">
            
            <dl class="nav__metro-wrapper">
                <dt class="nav__metro-bottom">
                    <a href="{{ env('METRO') }}">
                        @include('svg.metro')
                    </a>
                </dt>
                <dt class="nav__metro-title">
                    このサイトをシェアする
                </dt>
                <dd class="nav__metros">
                    <ul class="nav__metros-wrapper">
                        <li class="nav__metros-item fb">
                            <a href="{{ env('SOCIAL_FB') }}" rel="noopener">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="nav__metros-item twitter">
                            <a href="{{ env('SOCIAL_TWITTER') }}" rel="noopener">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="nav__metros-item line">
                            <a href="{{ env('SOCIAL_LINE') }}" rel="noopener">
                                <i class="fab fa-line"></i>
                            </a>
                        </li>
                    </ul>
                </dd>
            </dl>
        </div>
        <span id="js__close-nav" class="nav__close">
            <i class="fal fa-times"></i>
            <span class="text__close">
                閉じる
            </span>
        </span>
    </div>
</div>