@extends('admin._layout')

@section('title', 'Thêm bài viết')

@section('stylesheets')
<link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
@endsection
@section('javascripts')

    <script type="text/javascript" src="{{ asset('js/library/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/library/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/library/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('ckfinder/ckfinder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/validate.post.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/app.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/library/jquery-ui.min.js') }}"></script>
    <script>
        $( "#sortable" ).sortable();
    </script>
    
@endsection
@section('page_title', $recruit->recruit_id ? '募集情報編集' : '募集情報追加')

@section('content_admin')
<div class="page__post admin-main-content">

    <div class="row">
        <div class="col-12">
            @if (Session::has(Config::get('constant.SAVE_ERROR')))
            <div class="alert alert-warning">
                {{ Session::get(Config::get('constant.SAVE_ERROR')) }}
            </div>
            @elseif (Session::has(Config::get('constant.SAVE_SUCCESS')))
            <div class="alert alert-success">
                ポストを保存されました。
            </div>
            @endif
            {{-- @if(!empty($errors->all()))
                @foreach ($errors->all() as $error)
                <div class="alert alert-warning">
                    {{ $error }}
                </div>
                @endforeach
            @endif --}}
        </div>
    </div>
    <form class="row js-validate-form" action="{{ Route('ADMIN_SAVE_POST', ['id' => $recruit->recruit_id]) }}" method="POST">
        {!! csrf_field() !!}
        <div class="col-md-8">
            <div class="row block-content">
                <div class="js-parent__create-slug col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">
                        募集情報のタイトル 
                        <a target="_blank" id="show-url" class="link__post" href="{{ Route('DETAIL_PAGE', [ 'id' => $recruit->recruit_id ]) }}">
                            募集情報を表示する
                            <i class="hero-icon hero-shield-link-variant-outline"></i>
                        </a>
                    </h2>
                    <div class="input-control-link">
                        <input name="title" type="text" value="{{ old('title', $recruit->title ) }}"/>
                    </div>
                </div>
            </div>
            

            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">コンテンツ</h2>
                    <textarea name="content" id="editor1" class="h-100">{{ old('content', $recruit->content) }}</textarea>
                </div>
            </div>
            
            {{-- <div id="sortable">
                

                <div class="row js__remove-final">
                    <div class="col-12 text-right">
                        <button type="button" onclick="addMoreBlock()" class="btn btn-success btn-addmore"> 
                            追加
                        </button>
                    </div>
                </div>
            </div> --}}

        </div>
        <div class="col-md-4">
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <section class="pb-4">
                        <h2 class="title text-center">保存してポストします</h2>
                        <select name="public" class="js__single-select">
                            <option value="">保存タイプを選びます</option>
                            <option @if(old('public', $recruit->public) == Config::get('constant.TYPE_SAVE.PUBLIC')) {{ 'selected' }} @endif
                            value="{{ Config::get('constant.TYPE_SAVE.PUBLIC') }}">
                                公開
                            </option>
                            <option @if(old('public', $recruit->public) == Config::get('constant.TYPE_SAVE.ADMIN_READ')) {{ 'selected' }} @endif
                            value="{{ Config::get('constant.TYPE_SAVE.ADMIN_READ') }}">
                                {{-- chỉ admin xem --}}
                                アドミンだけ見えます。
                            </option>
                            
                        </select>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-save-data">
                                保存
                            </button>
                        </div>
                    </section>
                </div>
            </div>
            
            
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <section class="pb-4">
                        <h2 class="title text-center">支店を選んでください</h2>
                        @if($branchs)
                        <select name="branch_id" class="js__single-select">
                            <option value="">支店を選んでください</option>
                            @foreach($branchs as $branch)
                            <option @if(old('branch_id', $recruit->branch_id) == $branch->id) {{ 'selected' }} @endif
                            value="{{ $branch->id }}">{{ $branch->title }}</option>
                            @endforeach
                        </select>
                        @endif
                    </section>
                </div>
            </div>

        </div>
    </form>
</div>


@endsection