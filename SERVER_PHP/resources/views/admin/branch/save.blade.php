@extends('admin._layout')

@section('title', '新規カテゴリーを追加')

@section('javascripts')
    <script src="{{ asset('js/library/jquery.min.js') }}"></script>
    <script src="{{ asset('js/library/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/library/select2.min.js') }}"></script>
    <script src="{{ asset('js/library/wanakana.min.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckfinder/ckfinder.js') }}"></script>
    <script src="{{ asset('js/admin/validate.branch.min.js') }}"></script>
    <script src="{{ asset('js/admin/app.min.js') }}"></script>
    
@endsection


@section('page_title', $branch->id ? '修正支店' : '新規カテゴリーを追加' )

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
                新規カテゴリーを保存した。
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
    <form class="row js-validate-form" action="{{ Route('ADMIN_SAVE_BRANCH', ['id' => $branch->id]) }}" method="POST">
        {!! csrf_field() !!}
        
        <div class="col-md-8">
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">グループ名前</h2>
                    <input name="title" type="text" value="{{ old('title', $branch->title ) }}"/>
                </div>
            </div>
            
            {{--<div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">会社名前</h2>
                    <input name="company_name" type="text" value="{{ old('company_name', $branch->company_name ) }}"/>
                </div>
            </div>

            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">住所</h2>
                    <input name="address" type="text" value="{{ old('address', $branch->address ) }}"/>
                </div>
            </div>

            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">電話</h2>
                    <input name="phone" type="text" value="{{ old('phone', $branch->phone ) }}"/>
                </div>
            </div>

            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">ファクス</h2>
                    <input name="fax" type="text" value="{{ old('fax', $branch->fax ) }}"/>
                </div>
            </div>

            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">営業時間</h2>
                    <input name="time" type="text" value="{{ old('timme', $branch->time ) }}"/>
                </div>
            </div>

            {{-- phần lịch sử --}}
            <div id="sortable">
                
                @foreach ($histories as $key => $history)
                <div class="row block-content js-group-option">
                    <i onclick="removeBlockParent(this)" class="hero-icon hero-close"></i>
                    <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                        <h2 class="title">沿革情報</h2>
                        <input name="history[]" type="text" value="{{ old('history', $history->content ) }}"/>
                    </div>
                </div>
                @endforeach
                <div class="row js__remove-final">
                    <div class="col-12 text-right">
                        <button type="button" onclick="addMoreBlock()" class="btn btn-success btn-addmore"> 
                            沿革追加
                        </button>
                    </div>
                </div>
            </div>
            {{-- kết thúc phần lịch sử --}}

            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">抜粋</h2>
                    <textarea  class="height-80px" name="excerpt" cols="30" rows="10">{{ old('excerpt', $branch->excerpt) }}</textarea>
                </div>
            </div>--}}
            {{--<div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">コンテンツの右のイメージ</h2>
                    <div class="position-relative wrapper__selectImageWithCKFinder type-select-ckfinder__inline">
                        <input name="background" class="img__outputCKFinder jquery__append-out" type="text" 
                            value="{{ old('background', $branch->background) }}" 
                            onblur="showImage__InputCKFinder( this.value, this )"/>
                        <button class="btn bg-cyan bd-cyan text-white btn-input-append" 
                        type="button" onclick="selectImageWithCKFinder(this)">選んで</button>
                    </div>
                </div>
            </div>--}}

            {{--<div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">コンテンツ</h2>
                    <textarea name="content" id="editor1" class="h-100">{{ old('content', $branch->content) }}</textarea>
                </div>
            </div>--}}
            {{--<div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">メタ記述</h2>
                    <textarea class="height-80px" name="description" cols="30" rows="10">{{ old('description', $branch->description) }}</textarea>
                </div>
            </div>--}}
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    {{--<h2 class="title">募集ページのタイトル</h2>
                    <input name="title_recruit" type="text" value="{{ old('title_recruit', $branch->title_recruit ) }}"/>
                    <hr />--}}
		    <h2 class="title">カテゴリーの色を選びます</h2>
                    <input name="color" type="color" value="{{ old('title_recruit', $branch->color ) }}">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <section class="pb-4">
                        <h2 class="title text-center">支店を保存します</h2>
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
                    <section class="pb-4 wrapper__selectImageWithCKFinder">
                        <h2 class="title text-center">バナー設定</h2>
                        <div class="text-center">
                            <button type="button" onclick="selectImageWithCKFinder(this)"
                                class="btn btn-select-thumb">
                                バナー選んで
                            </button>
                        </div>
                        <div class="group-control-img-ckfinder">
                            <input name="banner" class="img__outputCKFinder thumbnail-topic mb-2" 
                                onblur="showImage__InputCKFinder( this.value, this )"
                                type="text" value="{{ old('banner', $branch->banner) }}" />
                        </div>
                    </section>
                </div>
            </div>
            
            {{-- hình ảnh --}}
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <section class="pb-4 wrapper__selectImageWithCKFinder">
                        <h2 class="title text-center">ロゴ設定</h2>
                        <div class="text-center">
                            <button type="button" onclick="selectImageWithCKFinder(this)"
                                class="btn btn-select-thumb">
                                ロゴ選んで
                            </button>
                        </div>
                        <div class="group-control-img-ckfinder">
                            <input name="image" class="img__outputCKFinder thumbnail-topic mb-2" 
                                onblur="showImage__InputCKFinder( this.value, this )"
                                type="text" value="{{ old('image', $branch->image) }}" />
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection