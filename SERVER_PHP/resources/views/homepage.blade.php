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
    <link rel="preload" as="style" href="{{ asset('css/styles.css' . Config::get('app.version'))}}">
    {{-- <link rel="preload" as="font" type="font/woff2" crossorigin href="/font/font-awe/webfonts/fa-solid-900.woff2"/>
    <link rel="preload" as="font" type="font/woff2" crossorigin href="/font/font-awe/webfonts/fa-light-300.woff2"/>
    <link rel="preload" as="font" type="font/woff2" crossorigin href="/font/font-awe/webfonts/fa-duotone-900.woff2"/>
    <link rel="preload" as="font" type="font/woff2" crossorigin href="/font/IconFont/webfont.woff2?v=1.4.57"/> --}}
@endsection
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/styles.css' . Config::get('app.version'))}}">
	<link rel="stylesheet" href="{{ asset('css/animate.min.css' . Config::get('app.version'))}}">
    <link rel="stylesheet" href="{{ asset('css/home.css' . Config::get('app.version'))}}">
@endsection
@section('javascripts')
    <script type="text/javascript" src="{{ asset('js/library/jquery.min.js' . Config::get('app.version')) }}"></script>
	<script type="text/javascript" src="{{ asset('js/homepage.js' . Config::get('app.version')) }}"></script>
@endsection
@section('content')

<div class="wrapper__sidebar animated fadeIn">
	@include('partial.sidebar')
	@include('partial.nav')
</div>
<div id="DIV_40">
	<div id="DIV_41">
		<header id="HEADER_42">
			<h1 id="H1_43">
				WeCompany
			</h1>
			<h2 id="H2_44">
				メトロでひびきあう、ひとりひとりの東京。
			</h2>
		</header>
		<div id="DIV_45">
			<nav id="NAV_53">
				<div id="DIV_54">
					<p id="P_55">
						<a href="https://asianconsulting.co.jp/" id="A_56"><span id="SPAN_57"><span id="SPAN_58"></span></span></a>
						<svg id="svg_59" viewBox="0 0 120 23">
							<title id="title_60" viewBox="0 0 120 23">
								We Company
							</title>
							<path id="path_61">
							</path>
							<path id="path_62">
							</path>
							<path id="path_63">
							</path>
							<path id="path_64">
							</path>
							<path id="path_65">
							</path>
							<path id="path_66">
							</path>
						</svg>
					</p>
					<ul id="UL_67">
						<li id="LI_68">
							<a href="https://asianconsulting.co.jp/" rel="noopener" id="A_69"><span id="SPAN_70"><span id="SPAN_71"></span></span></a>
							<svg id="svg_72" viewBox="0 0 120 23">
								<title id="title_73">
									東京メトロ
								</title>
								<path id="path_74">
								</path>
								<path id="path_75">
								</path>
								<path id="path_76">
								</path>
								<path id="path_77">
								</path>
								<path id="path_78">
								</path>
							</svg>
						</li>
						<li id="LI_79">
							<div id="DIV_80">
								<span id="SPAN_81"><span id="SPAN_82"></span></span>
								<svg id="svg_83" viewBox="0 0 120 23">
									<title id="title_84">
										シェア
									</title>
									<path id="path_85">
									</path>
								</svg>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<div id="DIV_86">
				<div id="DIV_87">
					<dl id="DL_88">
						<dt id="DT_89">
							このサイトをシェアする
						</dt>
						<dd id="DD_90">
							<ul id="UL_91">
								<li id="LI_92">
									<a href="https://www.facebook.com/" rel="noopener" id="A_93"><span id="SPAN_94"><span id="SPAN_95">
                                        </span>
                                            <svg id="svg_96" viewBox="0 0 12 23">
                                                <title id="title_97">
                                                    Facebook
                                                </title>
                                                <path id="path_98">
                                                </path>
                                            </svg>
                                        </span>
                                    </a>
								</li>
								<li id="LI_99">
									<a href="https://twitter.com/" rel="noopener" id="A_100"><span id="SPAN_101"><span id="SPAN_102"></span></span></a>
									<svg id="svg_103" viewBox="0 0 120 23">
										<title id="title_104">
											Twitter
										</title>
										<path id="path_105">
										</path>
									</svg>
								</li>
								<li id="LI_106">
									<a href="https://line.me/R/msg/text/?%E3%81%82%E3%81%AA%E3%81%9F%E3%82%82%E3%83%81%E3%83%A3%E3%83%AC%E3%83%B3%E3%82%B8%EF%BC%81Find%20my%20Tokyo.%20%7C%20%E6%9D%B1%E4%BA%AC%E3%83%A1%E3%83%88%E3%83%AD%20https%3A%2F%2Ffindmy.tokyo%2F" rel="noopener" id="A_107"><span id="SPAN_108"><span id="SPAN_109"></span></span></a>
									<svg id="svg_110" viewBox="0 0 120 23">
										<title id="title_111">
											LINE
										</title>
										<path id="path_112">
										</path>
										<path id="path_113">
										</path>
										<path id="path_114">
										</path>
									</svg>
								</li>
							</ul>
						</dd>
					</dl>
				</div>
			</div>

			<div id="DIV_187">
				<div id="DIV_188">
				</div>
				<div id="DIV_189">
					<div id="DIV_190">
						<ul id="UL_191">
							<li id="LI_192">
								<a href="https://findmy.tokyo/tag/2396" id="A_193"><span id="SPAN_194"><span id="SPAN_195"><span id="SPAN_196"></span></span></span></a>
								<svg id="svg_197" viewBox="0 0 120 23">
									<path id="path_198">
									</path>
								</svg>あまじょっぱスイーツ
							</li>
							<li id="LI_199">
								<a href="https://findmy.tokyo/tag/2400" id="A_200"><span id="SPAN_201"><span id="SPAN_202"><span id="SPAN_203"></span></span></span></a>
								<svg id="svg_204" viewBox="0 0 120 23">
									<path id="path_205">
									</path>
								</svg>オールナイト露天風呂
							</li>
							<li id="LI_206">
								<a href="https://findmy.tokyo/tag/2347" id="A_207"><span id="SPAN_208"><span id="SPAN_209"><span id="SPAN_210"></span></span></span></a>
								<svg id="svg_211" viewBox="0 0 120 23">
									<path id="path_212">
									</path>
								</svg>雨の日でもアクティビティ
							</li>
						</ul>
						<ul id="UL_213">
							<li id="LI_214">
								<a href="https://findmy.tokyo/" id="A_215">TOP</a>
							</li>
							<li id="LI_216">
								<a href="https://findmy.tokyo/about" id="A_217">Find my Tokyo.とは？</a>
							</li>
							<li id="LI_218">
								<a href="https://findmy.tokyo/gallery" id="A_219">広告ギャラリー</a>
							</li>
							<li id="LI_220">
								<a href="https://findmy.tokyo/ranking" id="A_221">人気のチャレンジ</a>
							</li>
							<li id="LI_222">
								<a href="https://findmy.tokyo/search" id="A_223">チャレンジ検索</a>
							</li>
							<li id="LI_224">
								<a href="https://findmy.tokyo/link" id="A_225">関連リンク</a>
							</li>
						</ul>
						<ul id="UL_226">
							<li id="LI_227">
								<a href="https://findmy.tokyo/tag/1928" id="A_228">2019年のチャレンジ</a>
							</li>
							<li id="LI_229">
								<a href="https://findmy.tokyo/tag/1482" id="A_230">2018年のチャレンジ</a>
							</li>
							<li id="LI_231">
								<a href="https://findmy.tokyo/tag/1121" id="A_232">2017年のチャレンジ</a>
							</li>
							<li id="LI_233">
								<a href="https://findmy.tokyo/tag/0561" id="A_234">2016年のチャレンジ</a>
							</li>
							<li id="LI_235">
								<a href="https://findmy.tokyo/2015/" rel="noopener" id="A_236">2015年のFind my Tokyo.</a>
							</li>
						</ul>
						<ul id="UL_237">
							<li id="LI_238">
								<a href="https://list.findmy.tokyo/" rel="noopener" id="A_239">Find my Tokyo. List<span id="SPAN_240"><span id="SPAN_241"><span id="SPAN_242"></span></span></span></a>
								<svg id="svg_243" viewBox="0 0 120 23">
									<path id="path_244">
									</path>
								</svg>
							</li>
						</ul>
						<dl id="DL_245">
							<dt id="DT_246">
								タグ別検索
							</dt>
							<dd id="DD_247">
								<ul id="UL_248">
									<li id="LI_249">
										<a href="https://findmy.tokyo/tag/0039" id="A_250">ダイエットは明日から</a>
									</li>
									<li id="LI_251">
										<a href="https://findmy.tokyo/tag/2339" id="A_252">プレゼントにもオススメ</a>
									</li>
									<li id="LI_253">
										<a href="https://findmy.tokyo/tag/2220" id="A_254">掘り出し物</a>
									</li>
									<li id="LI_255">
										<a href="https://findmy.tokyo/tag/2412" id="A_256">フルーツぎっしりサンド</a>
									</li>
								</ul>
							</dd>
						</dl>
						<div id="DIV_257">
							<a href="https://www.tokyometro.jp/" rel="noopener" id="A_258"><span id="SPAN_259"><span id="SPAN_260"></span></span></a>
							<svg id="svg_261" viewBox="0 0 120 23">
								<title id="title_262">
									東京メトロ
								</title>
								<path id="path_263">
								</path>
								<path id="path_264">
								</path>
								<path id="path_265">
								</path>
								<path id="path_266">
								</path>
								<path id="path_267">
								</path>
							</svg>
							<dl id="DL_268">
								<dt id="DT_269">
									このサイトをシェアする
								</dt>
								<dd id="DD_270">
									<ul id="UL_271">
										<li id="LI_272">
											<a href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Ffindmy.tokyo%2F" rel="noopener" id="A_273"><span id="SPAN_274"><span id="SPAN_275"></span></span></a>
											<svg id="svg_276" viewBox="0 0 120 23">
												<title id="title_277">
													Facebook
												</title>
												<path id="path_278">
												</path>
											</svg>
										</li>
										<li id="LI_279">
											<a href="https://twitter.com/share?text=%E3%81%82%E3%81%AA%E3%81%9F%E3%82%82%E3%83%81%E3%83%A3%E3%83%AC%E3%83%B3%E3%82%B8%EF%BC%81Find%20my%20Tokyo.%20%7C%20%E6%9D%B1%E4%BA%AC%E3%83%A1%E3%83%88%E3%83%AD&amp;url=https://findmy.tokyo/&amp;hashtags=findmytokyo" rel="noopener" id="A_280"><span id="SPAN_281"><span id="SPAN_282"></span></span></a>
											<svg id="svg_283" viewBox="0 0 120 23">
												<title id="title_284">
													Twitter
												</title>
												<path id="path_285">
												</path>
											</svg>
										</li>
										<li id="LI_286">
											<a href="https://line.me/R/msg/text/?%E3%81%82%E3%81%AA%E3%81%9F%E3%82%82%E3%83%81%E3%83%A3%E3%83%AC%E3%83%B3%E3%82%B8%EF%BC%81Find%20my%20Tokyo.%20%7C%20%E6%9D%B1%E4%BA%AC%E3%83%A1%E3%83%88%E3%83%AD%20https%3A%2F%2Ffindmy.tokyo%2F" rel="noopener" id="A_287"><span id="SPAN_288"><span id="SPAN_289"></span></span></a>
											<svg id="svg_290" viewBox="0 0 120 23">
												<title id="title_291">
													LINE
												</title>
												<path id="path_292">
												</path>
											</svg>
										</li>
									</ul>
								</dd>
							</dl>
						</div>
						<div id="DIV_293">
							<div id="DIV_294">
								<div id="DIV_295">
									<div id="DIV_296">
									</div>
									<div id="DIV_297">
									</div>
								</div>
							</div>閉じる
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="DIV_298">
			<div id="DIV_299">
				<div id="DIV_300" class="slider" style="display: block;">
					<div id="js__slider-homepage" class="slider__wrapper">
                        <!--slide contents-->
						<div class="slider__item"> 
                            <img src="{{ asset('images/pcside01_2004_02.jpg') }}" style="height: 200%">                           
						</div>
						<div class="slider__item">
                            <img src="{{ asset('images/pcside02_2001.jpg') }}" style="height: 200%">  
						</div>
						<div class="slider__item">
                            <img src="{{ asset('images/pcside04_2001.jpg') }}" style="height: 200%"> 
						</div>
						<div class="slider__item slider__item-video" style="height: 100%">
							<video autoplay muted loop="true">
								{{-- <source src="video.webm" type="video/webm" /> --}}
								<source src="{{ asset('/video/video-homepage.mp4') }}" type="video/mp4" />
							</video>
						</div>
					</div>
                        <!--end slide contents-->
					

					<p id="P_307">
						<span id="SPAN_308"><span id="SPAN_309">
							<!--<svg id="svg_310" viewBox="0 0 420 236">
								<title id="title_311">
									We Company!
								</title>
								<desc id="desc_312">
									メトロでひびきあう、ひとりひとりの東京。
								</desc>
								<path id="path_313">
								</path>
								<path id="path_314">
								</path>
								<path id="path_315">
								</path>
								<path id="path_316">
								</path>
								<path id="path_317">
								</path>
								<path id="path_318">
								</path>
								<path id="path_319">
								</path>
								<path id="path_320">
								</path>
								<path id="path_321">
								</path>
								<path id="path_322">
								</path>
							</svg>-->
							<span>We Company</span>
						</span></span>

					</p>
					<!--<div id="DIV_323">
						<div id="DIV_324">
						</div>
					</div>-->
				</div>
				<p id="P_325">
					<span id="SPAN_326"><span id="SPAN_327"></span></span>
					<svg id="svg_328" viewBox="0 0 120 23">
						<title id="title_329">
							あなたもチャレンジ! Find my Tokyo.
						</title>
						<desc id="desc_330">
							メトロでひびきあう、ひとりひとりの東京。
						</desc>
						<path id="path_331">
						</path>
						<path id="path_332">
						</path>
						<path id="path_333">
						</path>
						<path id="path_334">
						</path>
						<path id="path_335">
						</path>
						<path id="path_336">
						</path>
						<path id="path_337">
						</path>
						<path id="path_338">
						</path>
						<path id="path_339">
						</path>
						<path id="path_340">
						</path>
					</svg>
				</p>
				<main id="MAIN_341">
					<div id="DIV_342">
						<article id="ARTICLE_343" style="height: 256px; clear: none;">
							<a href="{{ Route('DETAIL_PAGE') }}" id="A_344" onmouseover="zoomImg('H3_354')" onmouseout="normalImg('H3_354')" >
                                <div id="DIV_345">
                                </div>
                                <div id="DIV_346">
                                    <dl id="DL_347">
                                        <dt id="DT_348">
                                            <span id="SPAN_349"><span id="SPAN_350"></span></span>

                                        </dt>
                                        <dd id="DD_353">
                                            59
                                        </dd>
                                    </dl>
                                </div>
                                <h3 id="H3_354">
                                    江戸時代の教科書を見てみよう！
                                </h3>
                                <div id="DIV_355">
                                    <div id="DIV_356">
                                    </div>
                                </div>
                            </a>
						</article>
						<article id="ARTICLE_357">
							<a href="https://list.findmy.tokyo/" rel="noopener"  class="boderColor myfind">
                                <div id="DIV_359">
                                    <div id="DIV_360">
                                        <img src="./images/img_panel_list.png" alt="Find my Tokyo. List" id="IMG_361" />
                                    </div>
                                    <div  class="boderColor" id="DIV_362">
                                        MORE
                                    </div>
                                </div>
                            </a>
						</article>
						<article id="ARTICLE_363">
							<a href="https://findmy.tokyo/challenge/05" id="A_364" onmouseover="zoomImg('H3_437')" onmouseout="normalImg('H3_437')">
                                <div id="DIV_365">
                                </div>
                                <div id="DIV_366">
                                    <dl id="DL_367">
                                        <dt id="DT_368">
                                            <span id="SPAN_369"><span id="SPAN_370"></span></span>

                                        </dt>
                                        <dd id="DD_373">
                                            05
                                        </dd>
                                    </dl>
                                </div>
                                <h3 id="H3_437">
                                    23区内で、カワセミを見よう！
                                </h3>
                                <div id="DIV_375">
                                    <div id="DIV_376">
                                    </div>
                                </div>
                            </a>
						</article>
						<article id="ARTICLE_377">
							<a href="https://findmy.tokyo/challenge/32" id="A_378" onmouseover="zoomImg('H3_388')" onmouseout="normalImg('H3_388')">
                                <div id="DIV_379">
                                </div>
                                <div id="DIV_380">
                                    <dl id="DL_381">
                                        <dt id="DT_382">
                                            <span id="SPAN_383"><span id="SPAN_384"></span></span>
                                        </dt>
                                        <dd id="DD_387">
                                            32
                                        </dd>
                                    </dl>
                                </div>
                                <h3 id="H3_388">
                                    香道を体験しよう！
                                </h3>
                                <div id="DIV_389">
                                    <div id="DIV_390">
                                    </div>
                                </div>
                            </a>
						</article>
						<article id="ARTICLE_391">
							<a href="https://findmy.tokyo/challenge/160" id="A_392" onmouseover="zoomImg('H3_402')" onmouseout="normalImg('H3_402')">
                                <div id="DIV_393">
                                </div>
                                <div id="DIV_394">
                                    <dl id="DL_395">
                                        <dt id="DT_396">
                                            <span id="SPAN_397"><span id="SPAN_398"></span></span>
                                        </dt>
                                        <dd id="DD_401">
                                            160
                                        </dd>
                                    </dl>
                                </div>
                                <h3 id="H3_402">
                                    日比谷公園でお宝を探してみよう！
                                </h3>
                                <div id="DIV_403">
                                    <div id="DIV_404">
                                    </div>
                                </div>
                            </a>
						</article>
						<article id="ARTICLE_405">
							<a href="https://findmy.tokyo/challenge/530" id="A_406" onmouseover="zoomImg('H3_416')" onmouseout="normalImg('H3_416')">
                                <div id="DIV_407">
                                </div>
                                <div id="DIV_408">
                                    <dl id="DL_409">
                                        <dt id="DT_410">
                                            <span id="SPAN_411"><span id="SPAN_412">
											</span></span>
                                        </dt>
                                        <dd id="DD_415">
                                            530
                                        </dd>
                                    </dl>
                                </div>
                                <h3 id="H3_416">
                                    バッグ工房併設カフェで優雅にランチしよう！
                                </h3>
                                <div id="DIV_417">
                                    <div id="DIV_418">
                                    </div>
                                </div>
                            </a>
						</article>
						<article id="ARTICLE_419">
							<a href="https://findmy.tokyo/gallery" id="A_420" onmouseover="zoomImg('A_420')" onmouseout="normalImg_('A_420')">
                                <div id="DIV_421">
                                    <div id="DIV_422">
                                        <img src="https://findmy.tokyo/wp/wp-content/uploads/2020/03/gallery_2004_top_02.jpg" alt="広告ギャラリー" id="IMG_423" />
                                    </div>
                                    <h3 id="H3_424">
                                        広告ギャラリー
                                    </h3>
                                    <div id="DIV_425">
                                        MORE
                                    </div>
                                </div>
                            </a>
						</article>
						<article id="ARTICLE_426">
							<a href="https://findmy.tokyo/challenge/581" id="A_427" onmouseover="zoomImg('H3_438')" onmouseout="normalImg('H3_438')">
                                <div id="DIV_428">
                                </div>
                                <div id="DIV_429">
                                    <dl id="DL_430">
                                        <dt id="DT_431">
                                            <span id="SPAN_432"><span id="SPAN_433"></span></span>
                                        </dt>
                                        <dd id="DD_436">
                                            581
                                        </dd>
                                    </dl>
                                </div>
                                <h3 id="H3_438">
                                    ペンギンのいるバーに行こう！
                                </h3>
                                <div id="DIV_438">
                                    <div id="DIV_439">
                                    </div>
                                </div>
                            </a>
						</article>
						<article id="ARTICLE_440">
							<a href="https://findmy.tokyo/challenge/584" id="A_441" onmouseover="zoomImg('H3_451')" onmouseout="normalImg('H3_451')">
                                <div id="DIV_442">
                                </div>
                                <div id="DIV_443">
                                    <dl id="DL_444">
                                        <dt id="DT_445">
                                            <span id="SPAN_446"><span id="SPAN_447"></span></span>
                                        </dt>
                                        <dd id="DD_450">
                                            584
                                        </dd>
                                    </dl>
                                </div>
                                <h3 id="H3_451">
                                    本屋さんに泊まろう！
                                </h3>
                                <div id="DIV_452">
                                    <div id="DIV_453">
                                    </div>
                                </div>
                            </a>
						</article>
						<article id="ARTICLE_454">
							<a href="https://findmy.tokyo/link" id="A_455" onmouseover="zoomImg('A_455')" onmouseout="normalImg_('A_455')">
                                <div id="DIV_456">
                                    <h3 id="H3_457">
                                        関連LINK
                                    </h3>
                                    <div id="DIV_458">
                                        MORE
                                    </div>
                                </div>
                            </a>
						</article>
					</div>
				</main>
				<div id="DIV_459">
					<div id="DIV_460">
					</div>
				</div>
			</div>
		</div>
		<footer id="FOOTER_461">
			<div id="DIV_462">
				<span id="SPAN_463"><span id="SPAN_464"></span></span>
				<svg id="svg_465" viewBox="0 0 120 23">
					<path id="path_466">
					</path>
				</svg>
			</div>
			<p id="P_467">
				<small id="SMALL_468">Copyright© Tokyo Metro Co., Ltd All rights reserved.</small>
			</p>
		</footer>
	</div>
</div>
<div id="DIV_469">
	<div id="DIV_470">
		<div id="DIV_471">
			<div id="DIV_472">
				<p id="P_473">
					<!--<img src="https://findmy.tokyo/assets/images/common/logo.png" alt="We Company" id="IMG_474" />-->
                    <a id="IMG_474">We Company</a>
				</p>
				<p id="P_475">
					ご使用のブラウザは推奨環境外のバージョンになります。<br id="BR_476" />下記の推奨環境をご確認いただき、再度トップページをご覧ください。
				</p>
				<p id="P_477">
					ご使用のブラウザは<br id="BR_478" />推奨環境外のバージョンになります。<br id="BR_479" />下記の推奨環境をご確認いただき、<br id="BR_480" />再度トップページをご覧ください。
				</p>
			</div>
			<div id="DIV_481">
				<dl id="DL_482">
					<dt id="DT_483">
						【パソコン】
					</dt>
					<dd id="DD_484">
						・Microsoft internet Explorer（最新版）<br id="BR_485" />・Mozilla Firefox（最新版）<br id="BR_486" />・Google Chrome（最新版）<br id="BR_487" />・Safari（最新版）
					</dd>
					<dd id="DD_488">
						※Internet Explorerの最新版ダウンロード方法は<a href="https://support.microsoft.com/ja-jp/help/17621/internet-explorer-downloads" id="A_489">Microsoftのサポートページ</a>をご確認ください。<br id="BR_490" />※お客様のご使用環境によっては、上記環境でも推奨環境外の画面が表示される場合がございます。<br id="BR_491" />その際は他のブラウザをお試しください。
					</dd>
					<dt id="DT_492">
						【スマートフォン】
					</dt>
					<dd id="DD_493">
						Docomo、au、SoftBank端末<br id="BR_494" />・iOS最新版のSafari、iPhone6以上<br id="BR_495" />・Amdroid5.0以上、Google chrome
					</dd>
					<dd id="DD_496">
						※上記環境に含まれる場合でも、OSのバージョンやお客様のご使用環境、<br id="BR_497" />端末によっては、閲覧頂けない場合がございます。ご了承ください。
					</dd>
				</dl>
				<dl id="DL_498">
					<dt id="DT_499">
						【パソコン】
					</dt>
					<dd id="DD_500">
						・Microsoft internet Explorer（最新版）<br id="BR_501" />・Mozilla Firefox（最新版）<br id="BR_502" />・Google Chrome（最新版）<br id="BR_503" />・Safari（最新版）
					</dd>
					<dd id="DD_504">
						※Internet Explorerの最新版ダウンロード方法は<br id="BR_505" /><a href="https://support.microsoft.com/ja-jp/help/17621/internet-explorer-downloads" id="A_506">Microsoftのサポートページ</a>をご確認ください。<br id="BR_507" />※お客様のご使用環境によっては、<br id="BR_508" />上記環境でも推奨環境外の画面が表示される場合がございます。<br id="BR_509" />その際は他のブラウザをお試しください。
					</dd>
					<dt id="DT_510">
						【スマートフォン】
					</dt>
					<dd id="DD_511">
						Docomo、au、SoftBank端末<br id="BR_512" />・iOS最新版のSafari、iPhone6以上<br id="BR_513" />・Amdroid5.0以上、Google chrome
					</dd>
					<dd id="DD_514">
						※上記環境に含まれる場合でも、<br id="BR_515" />OSのバージョンやお客様のご使用環境、<br id="BR_516" />端末によっては、閲覧頂けない場合がございます。<br id="BR_517" />ご了承ください
					</dd>
				</dl>
			</div>
		</div>
	</div>
</div>
@endsection