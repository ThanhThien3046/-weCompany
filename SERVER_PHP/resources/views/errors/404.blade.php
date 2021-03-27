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
    <link rel="preload" as="style" href="{{ asset('css/errors-404.css' . Config::get('app.version'))}}">
    {{-- <link rel="preload" as="font" type="font/woff2" crossorigin href="/font/font-awe/webfonts/fa-solid-900.woff2"/>
    <link rel="preload" as="font" type="font/woff2" crossorigin href="/font/font-awe/webfonts/fa-light-300.woff2"/>
    <link rel="preload" as="font" type="font/woff2" crossorigin href="/font/font-awe/webfonts/fa-duotone-900.woff2"/>
    <link rel="preload" as="font" type="font/woff2" crossorigin href="/font/IconFont/webfont.woff2?v=1.4.57"/> --}}
@endsection
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/errors-404.css' . Config::get('app.version'))}}">
@endsection
@section('javascripts')
    <script type="text/javascript" src="{{ asset('js/library/jquery.min.js' . Config::get('app.version')) }}"></script>
	<script type="text/javascript" src="{{ asset('js/homepage.js' . Config::get('app.version')) }}"></script>
@endsection
@section('content')


<div id="DIV_40">
	<div id="DIV_41">
		<header id="HEADER_42">
			<h1 id="H1_43">
				Find my Tokyo.
			</h1>
			<h2 id="H2_44">
				メトロでひびきあう、ひとりひとりの東京。
			</h2>
		</header>
		<div id="DIV_45">
			<div id="DIV_46">
				<ul id="UL_47">
					<li id="LI_48">
					</li>
					<li id="LI_49">
					</li>
					<li id="LI_50">
					</li>
					<li id="LI_51">
					</li>
					<li id="LI_52">
					</li>
				</ul>
			</div>
			<nav id="NAV_53">
				<div id="DIV_54">
					<p id="P_55">
						<a href="https://findmy.tokyo/" id="A_56"><span id="SPAN_57"><span id="SPAN_58"></span></span></a>
						<svg id="svg_59">
							<title id="title_60">
								Find my Tokyo.
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
							<a href="https://www.tokyometro.jp/" rel="noopener" id="A_69"><span id="SPAN_70"><span id="SPAN_71"></span></span></a>
							<svg id="svg_72">
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
								<svg id="svg_83">
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
									<a href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Ffindmy.tokyo%2F" rel="noopener" id="A_93"><span id="SPAN_94"><span id="SPAN_95"></span></span></a>
									<svg id="svg_96">
										<title id="title_97">
											Facebook
										</title>
										<path id="path_98">
										</path>
									</svg>
								</li>
								<li id="LI_99">
									<a href="https://twitter.com/share?text=%E3%81%82%E3%81%AA%E3%81%9F%E3%82%82%E3%83%81%E3%83%A3%E3%83%AC%E3%83%B3%E3%82%B8%EF%BC%81Find%20my%20Tokyo.%20%7C%20%E6%9D%B1%E4%BA%AC%E3%83%A1%E3%83%88%E3%83%AD&amp;url=https://findmy.tokyo/&amp;hashtags=findmytokyo" rel="noopener" id="A_100"><span id="SPAN_101"><span id="SPAN_102"></span></span></a>
									<svg id="svg_103">
										<title id="title_104">
											Twitter
										</title>
										<path id="path_105">
										</path>
									</svg>
								</li>
								<li id="LI_106">
									<a href="https://line.me/R/msg/text/?%E3%81%82%E3%81%AA%E3%81%9F%E3%82%82%E3%83%81%E3%83%A3%E3%83%AC%E3%83%B3%E3%82%B8%EF%BC%81Find%20my%20Tokyo.%20%7C%20%E6%9D%B1%E4%BA%AC%E3%83%A1%E3%83%88%E3%83%AD%20https%3A%2F%2Ffindmy.tokyo%2F" rel="noopener" id="A_107"><span id="SPAN_108"><span id="SPAN_109"></span></span></a>
									<svg id="svg_110">
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
			<div id="DIV_115">
				<div id="DIV_116">
					<ul id="UL_117">
						<li id="LI_118">
							<a href="https://findmy.tokyo/" id="A_119"><span id="SPAN_120"><span id="SPAN_121"></span></span></a>
							<svg id="svg_122">
								<title id="title_123">
									ホーム
								</title>
								<path id="path_124">
								</path>
							</svg>
						</li>
						<li id="LI_125">
							<a href="https://findmy.tokyo/gallery" id="A_126"><span id="SPAN_127"><span id="SPAN_128"></span></span></a>
							<svg id="svg_129">
								<title id="title_130">
									広告ギャラリー
								</title>
								<path id="path_131">
								</path>
								<path id="path_132">
								</path>
								<path id="path_133">
								</path>
							</svg>
						</li>
						<li id="LI_134">
							<a href="https://findmy.tokyo/ranking" id="A_135"><span id="SPAN_136"><span id="SPAN_137"></span></span></a>
							<svg id="svg_138">
								<title id="title_139">
									ランキング
								</title>
								<path id="path_140">
								</path>
								<path id="path_141">
								</path>
								<path id="path_142">
								</path>
							</svg>
						</li>
						<li id="LI_143">
							<a href="https://findmy.tokyo/search" id="A_144"><span id="SPAN_145"><span id="SPAN_146"></span></span></a>
							<svg id="svg_147">
								<title id="title_148">
									チャレンジ検索
								</title>
								<path id="path_149">
								</path>
								<path id="path_150">
								</path>
								<path id="path_151">
								</path>
								<path id="path_152">
								</path>
							</svg>
						</li>
						<li id="LI_153">
							<a href="https://findmy.tokyo/about" id="A_154"><span id="SPAN_155"><span id="SPAN_156"></span></span></a>
							<svg id="svg_157">
								<title id="title_158">
									FMTとは?
								</title>
								<path id="path_159">
								</path>
								<path id="path_160">
								</path>
								<path id="path_161">
								</path>
							</svg>
						</li>
					</ul>
					<ul id="UL_162">
						<li id="LI_163">
							<a href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Ffindmy.tokyo%2F" rel="noopener" id="A_164"><span id="SPAN_165"><span id="SPAN_166"></span></span></a>
							<svg id="svg_167">
								<title id="title_168">
									Facebook
								</title>
								<path id="path_169">
								</path>
							</svg>
						</li>
						<li id="LI_170">
							<a href="https://twitter.com/share?text=%E3%81%82%E3%81%AA%E3%81%9F%E3%82%82%E3%83%81%E3%83%A3%E3%83%AC%E3%83%B3%E3%82%B8%EF%BC%81Find%20my%20Tokyo.%20%7C%20%E6%9D%B1%E4%BA%AC%E3%83%A1%E3%83%88%E3%83%AD&amp;url=https://findmy.tokyo/&amp;hashtags=findmytokyo" rel="noopener" id="A_171"><span id="SPAN_172"><span id="SPAN_173"></span></span></a>
							<svg id="svg_174">
								<title id="title_175">
									Twitter
								</title>
								<path id="path_176">
								</path>
							</svg>
						</li>
					</ul><a href="https://www.tokyometro.jp/" rel="noopener" id="A_177"><span id="SPAN_178"><span id="SPAN_179"></span></span></a>
					<svg id="svg_180">
						<title id="title_181">
							東京メトロ
						</title>
						<path id="path_182">
						</path>
						<path id="path_183">
						</path>
						<path id="path_184">
						</path>
						<path id="path_185">
						</path>
						<path id="path_186">
						</path>
					</svg>
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
								<svg id="svg_197">
									<path id="path_198">
									</path>
								</svg>あまじょっぱスイーツ
							</li>
							<li id="LI_199">
								<a href="https://findmy.tokyo/tag/2400" id="A_200"><span id="SPAN_201"><span id="SPAN_202"><span id="SPAN_203"></span></span></span></a>
								<svg id="svg_204">
									<path id="path_205">
									</path>
								</svg>オールナイト露天風呂
							</li>
							<li id="LI_206">
								<a href="https://findmy.tokyo/tag/2347" id="A_207"><span id="SPAN_208"><span id="SPAN_209"><span id="SPAN_210"></span></span></span></a>
								<svg id="svg_211">
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
								<svg id="svg_243">
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
							<svg id="svg_261">
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
											<svg id="svg_276">
												<title id="title_277">
													Facebook
												</title>
												<path id="path_278">
												</path>
											</svg>
										</li>
										<li id="LI_279">
											<a href="https://twitter.com/share?text=%E3%81%82%E3%81%AA%E3%81%9F%E3%82%82%E3%83%81%E3%83%A3%E3%83%AC%E3%83%B3%E3%82%B8%EF%BC%81Find%20my%20Tokyo.%20%7C%20%E6%9D%B1%E4%BA%AC%E3%83%A1%E3%83%88%E3%83%AD&amp;url=https://findmy.tokyo/&amp;hashtags=findmytokyo" rel="noopener" id="A_280"><span id="SPAN_281"><span id="SPAN_282"></span></span></a>
											<svg id="svg_283">
												<title id="title_284">
													Twitter
												</title>
												<path id="path_285">
												</path>
											</svg>
										</li>
										<li id="LI_286">
											<a href="https://line.me/R/msg/text/?%E3%81%82%E3%81%AA%E3%81%9F%E3%82%82%E3%83%81%E3%83%A3%E3%83%AC%E3%83%B3%E3%82%B8%EF%BC%81Find%20my%20Tokyo.%20%7C%20%E6%9D%B1%E4%BA%AC%E3%83%A1%E3%83%88%E3%83%AD%20https%3A%2F%2Ffindmy.tokyo%2F" rel="noopener" id="A_287"><span id="SPAN_288"><span id="SPAN_289"></span></span></a>
											<svg id="svg_290">
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
				<section id="SECTION_300">
				</section>
				<div id="DIV_301">
					<div id="DIV_302">
					</div>
					<div id="DIV_303">
						<div id="DIV_304">
							<div id="DIV_305">
								<div id="DIV_306">
									<div id="DIV_307">
										<div id="DIV_308">
										</div>
										<div id="DIV_309">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="DIV_310">
					<div id="DIV_311">
					</div>
				</div>
			</div>
			<section id="SECTION_312">
				<header id="HEADER_313">
					<h3 id="H3_314">
						<span id="SPAN_315">
                            <span id="SPAN_316">
                            <svg id="svg_317">
							<title id="title_318">
								あなたもチャレンジ! Find my Tokyo.
							</title>
							<desc id="desc_319">
								メトロでひびきあう、ひとりひとりの東京。
							</desc>
							<path id="path_320">
							</path>
							<path id="path_321">
							</path>
							<path id="path_322">
							</path>
							<path id="path_323">
							</path>
							<path id="path_324">
							</path>
							<path id="path_325">
							</path>
							<path id="path_326">
							</path>
							<path id="path_327">
							</path>
							<path id="path_328">
							</path>
							<path id="path_329">
							</path>
						</svg>
                            </span>
                        </span>
					</h3>
				</header>
				<div id="DIV_330">
					<p id="P_331">
						404 Not Found.
					</p>
					<p id="P_332">
						誠に申し訳ございませんが、<br id="BR_333" />アクセスしたページが見つかりませんでした。<br id="BR_334" />トップページから再度アクセスをお願い致します。
					</p>
				</div>
				<footer id="FOOTER_335">
					<a href="https://findmy.tokyo/" id="A_336">TOPへ戻る</a>
				</footer>
			</section>
		</div>
		<footer id="FOOTER_337">
			<div id="DIV_338">
				<span id="SPAN_339"><span id="SPAN_340"></span></span>
				<svg id="svg_341">
					<path id="path_342">
					</path>
				</svg>
			</div>
			<p id="P_343">
				<small id="SMALL_344">Copyright© Tokyo Metro Co., Ltd All rights reserved.</small>
			</p>
		</footer>
	</div>
</div>
<div id="DIV_345">
	<div id="DIV_346">
		<div id="DIV_347">
			<div id="DIV_348">
				<p id="P_349">
					<img src="https://findmy.tokyo/assets/images/common/logo.png" alt="あなたもチャレンジ! Find my Tokyo." id="IMG_350" />
				</p>
				<p id="P_351">
					ご使用のブラウザは推奨環境外のバージョンになります。<br id="BR_352" />下記の推奨環境をご確認いただき、再度トップページをご覧ください。
				</p>
				<p id="P_353">
					ご使用のブラウザは<br id="BR_354" />推奨環境外のバージョンになります。<br id="BR_355" />下記の推奨環境をご確認いただき、<br id="BR_356" />再度トップページをご覧ください。
				</p>
			</div>
			<div id="DIV_357">
				<dl id="DL_358">
					<dt id="DT_359">
						【パソコン】
					</dt>
					<dd id="DD_360">
						・Microsoft internet Explorer（最新版）<br id="BR_361" />・Mozilla Firefox（最新版）<br id="BR_362" />・Google Chrome（最新版）<br id="BR_363" />・Safari（最新版）
					</dd>
					<dd id="DD_364">
						※Internet Explorerの最新版ダウンロード方法は<a href="https://support.microsoft.com/ja-jp/help/17621/internet-explorer-downloads" id="A_365">Microsoftのサポートページ</a>をご確認ください。<br id="BR_366" />※お客様のご使用環境によっては、上記環境でも推奨環境外の画面が表示される場合がございます。<br id="BR_367" />その際は他のブラウザをお試しください。
					</dd>
					<dt id="DT_368">
						【スマートフォン】
					</dt>
					<dd id="DD_369">
						Docomo、au、SoftBank端末<br id="BR_370" />・iOS最新版のSafari、iPhone6以上<br id="BR_371" />・Amdroid5.0以上、Google chrome
					</dd>
					<dd id="DD_372">
						※上記環境に含まれる場合でも、OSのバージョンやお客様のご使用環境、<br id="BR_373" />端末によっては、閲覧頂けない場合がございます。ご了承ください。
					</dd>
				</dl>
				<dl id="DL_374">
					<dt id="DT_375">
						【パソコン】
					</dt>
					<dd id="DD_376">
						・Microsoft internet Explorer（最新版）<br id="BR_377" />・Mozilla Firefox（最新版）<br id="BR_378" />・Google Chrome（最新版）<br id="BR_379" />・Safari（最新版）
					</dd>
					<dd id="DD_380">
						※Internet Explorerの最新版ダウンロード方法は<br id="BR_381" /><a href="https://support.microsoft.com/ja-jp/help/17621/internet-explorer-downloads" id="A_382">Microsoftのサポートページ</a>をご確認ください。<br id="BR_383" />※お客様のご使用環境によっては、<br id="BR_384" />上記環境でも推奨環境外の画面が表示される場合がございます。<br id="BR_385" />その際は他のブラウザをお試しください。
					</dd>
					<dt id="DT_386">
						【スマートフォン】
					</dt>
					<dd id="DD_387">
						Docomo、au、SoftBank端末<br id="BR_388" />・iOS最新版のSafari、iPhone6以上<br id="BR_389" />・Amdroid5.0以上、Google chrome
					</dd>
					<dd id="DD_390">
						※上記環境に含まれる場合でも、<br id="BR_391" />OSのバージョンやお客様のご使用環境、<br id="BR_392" />端末によっては、閲覧頂けない場合がございます。<br id="BR_393" />ご了承ください
					</dd>
				</dl>
			</div>
		</div>
	</div>
</div>
@endsection