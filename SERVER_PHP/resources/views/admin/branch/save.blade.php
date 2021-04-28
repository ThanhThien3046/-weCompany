@extends('admin._layout')

@section('title', 'Thêm topic')

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


@section('page_title', $branch->id ? '修正支店' : '追加支店' )

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
                支店保存した。
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
            
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">抜粋</h2>
                    <textarea  class="height-80px" name="excerpt" cols="30" rows="10">{{ old('excerpt', $branch->excerpt) }}</textarea>
                </div>
            </div>
            <div class="row block-content">
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
            </div>

            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">コンテンツ</h2>
                    <textarea name="content" id="editor1" class="h-100">{{ old('content', $branch->content) }}</textarea>
                </div>
            </div>
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">メタ記述</h2>
                    <textarea class="height-80px" name="description" cols="30" rows="10">{{ old('description', $branch->description) }}</textarea>
                </div>
            </div>
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">募集ページのタイトル</h2>
                    <input name="title_recruit" type="text" value="{{ old('title_recruit', $branch->title_recruit ) }}"/>
                    <hr />
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
                        <h2 class="title text-center">イメージ設定</h2>
                        <div class="text-center">
                            <button type="button" onclick="selectImageWithCKFinder(this)"
                                class="btn btn-select-thumb">
                                バナー選んで
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