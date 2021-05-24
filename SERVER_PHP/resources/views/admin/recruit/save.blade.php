@extends('admin._layout')

@section('title', 'リクルートを挿入')

@section('javascripts')
    <script src="{{ asset('js/library/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('js/library/jquery.validate.min.js') }}"></script> --}}
    <script src="{{ asset('js/library/select2.min.js') }}"></script>
    <script src="{{ asset('js/library/wanakana.min.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckfinder/ckfinder.js') }}"></script>
    {{-- <script src="{{ asset('js/admin/validate.branch.min.js') }}"></script> --}}
    <script src="{{ asset('js/admin/app.min.js') }}"></script>
    
@endsection


@section('page_title', $recruit->id ? '募集情報更新' : '募集情報追加' )

@section('content_admin')
<div class="page__topic admin-main-content">

    <div class="row">
        <div class="col-12">
            @if (Session::has(Config::get('constant.SAVE_ERROR')))
            <div class="alert alert-warning">
                {{ Session::get(Config::get('constant.SAVE_ERROR')) }}
            </div>
            @elseif (Session::has(Config::get('constant.SAVE_SUCCESS')))
            <div class="alert alert-success">
                募集情報を保存した。
            </div>
            @endif
            @if(!empty($errors->all()))
                @foreach ($errors->all() as $error)
                <div class="alert alert-warning">
                    {{ $error }}
                </div>
                @endforeach
            @endif
        </div>
    </div>
    <form class="row js-validate-form" action="{{ Route('ADMIN_SAVE_RECRUIT', ['id' => $recruit->id]) }}" method="POST">
        {!! csrf_field() !!}
        
        <div class="col-md-8">
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">募集タイトル</h2>
                    <input name="title" type="text" value="{{ old('title', $recruit->title ) }}"/>
                </div>
            </div>
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">コンテンツ</h2>
                    <textarea name="content" id="editor1" class="h-100">{{ old('content', $recruit->content) }}</textarea>
                </div>
            </div>
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <div class="form-input cus_checkbox">
                        <h2 class="title">崩壊クライアントを表示します</h2>
                        <label class="container">はい
                            <input type="checkbox" name="show" 
                            @if(old('show', $recruit->show )) checked @endif
                            value="1"/>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <section class="pb-4">
                        <h2 class="title text-center">新しい募集情報保存</h2>
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
                        <h2 class="title text-center">カテゴリー選んでください</h2>
                        @if($branchs)
                        <select name="branch_id" class="js__single-select">
                            <option value="">カテゴリー選んでください</option>
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