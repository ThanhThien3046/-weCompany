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
    <link rel="preload" as="style" href="{{ asset('css/search.css' . Config::get('app.version'))}}">
@endsection
@section('stylesheets')	
	<link rel="stylesheet" href="{{ asset('css/animate.min.css' . Config::get('app.version'))}}">
	<link rel="stylesheet" href="{{ asset('css/styles.css' . Config::get('app.version'))}}">
	<link rel="stylesheet" href="{{ asset('css/home.css' . Config::get('app.version'))}}">
	<link rel="stylesheet" href="{{ asset('css/search.css' . Config::get('app.version'))}}">
@endsection
@section('javascripts')
    <script type="text/javascript" src="{{ asset('js/library/jquery.min.js' . Config::get('app.version')) }}"></script>
    <script type="text/javascript" src="{{ asset('js/search.js' . Config::get('app.version')) }}"></script>
	<script type="text/javascript" src="{{ asset('js/home.js' . Config::get('app.version')) }}"></script>
@endsection
@section('content')

	<div class="wrapper__sidebar animated fadeIn">
		@include('partial.sidebar')
		@include('partial.nav')
	</div>

	<main id="page__search">
		<h1 class="title">WE グループの沿革</h1>
		<nav class="check">
			<ul>
                @if (!$branchs->isEmpty())
                    @foreach ($branchs as $key => $branch)
                    <li data-id="{{ $branch->id }}"><img src="{{ asset($branch->image) }}" width="530" height="622" alt=""/></li>
                    @endforeach
                @endif
			</ul>
		</nav>

        @if (!$branchs->isEmpty())
        @foreach ($branchs as $key => $branch)
        @php
            $branchId = $branch->id;
            $postsInBranchs = array_filter($posts->toArray(), function( $item ) use ($branchId){ return $item->branch_id == $branchId; });
            
        @endphp
        
        <div class="js__toggle-item history" data-id="{{ $branch->id }}" data-collapse="{{ count($postsInBranchs) }}">
            <div class="history-info">
            {{-- @foreach ($infoCompanies as $company_info)
                @if ($company_info->branch_id == $branch->id)
                    <div class="history-info-left">
                        <b>{{$company_info->company_name}}</b><br>
                        住所：{{$company_info->address}}<br>
                        TEL：{{$company_info->phone}}<br>
                        FAX：{{$company_info->Fax}}<br>
                        営業時間：{{$company_info->time}}
                    </div>
                @endif
            @endforeach --}}
                    <div class="history-info-left">
                        <b>{{$branch->company_name}}</b><br>
                        郵便番号: 〒906-0505 <br>
                        住所：{{$branch->address}}<br>
                        TEL：{{$branch->phone}}<br>
                        FAX：{{$branch->fax}}<br>
                        営業時間：{{$branch->time}} <br>
                        URL: {{$branch->weburl}} <br>
                        MAIL: {{$branch->mailurl}} <br>
                        代表取締役: {{$branch->ceo}}　<br>
                        設立: {{$branch->estabtime}}<br>
                        資本金: {{$branch->fund}}<br>
                        従業員数: {{$branch->employnum}} <br>
                        事業内容:<br>
                        {{$branch->jobcontent}}<br>

                        {{-- 
                        ■Group全体の運用サポート<br>
                        ■Group全体の運用サポート<br>
                        ■Group全体の運用サポート<br>
                        ・経営コンサルティング<br>
                        ・経営コンサルティング<br>
                        ■Group全体の運用サポート<br> --}}
                    </div>
                    <hr>
                    <div class="history-info-right">
                        <b>沿革</b><br>			
                        {{-- 2021年　2月	{{$company_info->history_content}} <br> --}}
                        @foreach ($histories as $history)
                        @if ($history->branch_id == $branch->id)
                        {{$history->content}}<br>
                        @endif
                        @endforeach
                
                    </div>

            </div>
            




			<h2 class="history__title">{{ $branch->company_name }}のニュース</h2>
            
            @foreach ($postsInBranchs as $key => $postHistory)
            <a href="{{Route('HISTORY_PAGE', [ 'branch_id' => $postHistory->branch_id, 'year' => $postHistory->year ])}}" class="enkaku">
				<ul>
                    
                        <li  style="background-color: {{ $branch->color }}">
                            <span>{{ $postHistory->count }}</span>
                        </li>
                        <li>{{ $postHistory->year }}</li>
                        
                        <li><i class="fas fa-arrow-right"></i></li>
                    
				</ul>
			</a>
            @endforeach
		</div>
        @endforeach
        @endif
	</main>


@include('partial.footer')

@endsection