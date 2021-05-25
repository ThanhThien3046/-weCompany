<div id="js__nav" class="nav">
    <i class="fas fa-window-close nav__icon-close" id="js__close-navi"></i>
    <div class="nav__wrapper">
        <ul class="nav__top">
            <li class="nav__top-item">
                <a href="">
                    <span class="circle"><i class="far fa-bookmark"></i></span>
                    <span class="text-tag">Webメニュー</span>
                </a>
            </li>
        </ul>
        <ul class="nav__links">
            <li class="nav__links-item">
                <a href="http://wecompany.co.jp/">TOP</a>
            </li>
            <li class="nav__links-item">
                <a href="http://wecompany.co.jp/weHomes">WE GROUP</a>
            </li>
            <li class="nav__links-item">
                <a href="http://wecompany.co.jp/search">WE沿革</a>
            </li>
            <li class="nav__links-item">
                <a href="https://wecompany.co.jp/recruit">WE求人</a>
            </li>
            <li class="nav__links-item">
                <a href="http://wecompany.co.jp/about">WE・COMPANYとは</a>
            </li>
            <li class="nav__links-item">
                <a href="https://wecompany.co.jp/contact">お問い合わせ</a>
            </li>
        </ul>

        <dl class="nav__search">
            <dd class="nav__searchs">
            </dd>
        </dl>
        <div class="nav__metro">
            
            <dl class="nav__metro-wrapper">


                <dd class="nav__metros">
                    <ul class="nav__metros-wrapper">
                        <li class="nav__metros-item fb">
                            <a href="{{env('SOCIAL_FB')}}" rel="noopener" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="nav__metros-item twitter">
                            <a href="{{ env('SOCIAL_TWITTER') }}" rel="noopener" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="nav__metros-item instagram">
                            <a href="{{ env('SOCIAL_INSTA') }}" rel="noopener" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li class="nav__metros-item youtube">
                            <a href="{{ env('SOCIAL_YOUTUBE') }}" rel="noopener" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                    </ul>
                </dd>
                <dt class="nav__metro-title">
                    このサイトをシェアする
                </dt>
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