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
    
@endsection
@section('page_title', $post->id ? 'Edit Post' : 'Insert Post')

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
                lưu bài viết thành công
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
    <form class="row js-validate-form" action="{{ Route('ADMIN_SAVE_POST', ['id' => $post->id]) }}" method="POST">
        {!! csrf_field() !!}
        <div class="col-md-8">
            <div class="row block-content">
                <div class="js-parent__create-slug col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">
                        title post 
                        <a target="_blank" id="show-url" class="link__post" href="/{{ $post->slug }}">
                            hiện thị post
                            <i class="hero-icon hero-shield-link-variant-outline"></i>
                        </a>
                    </h2>
                    <div class="input-control-link">
                        <input name="title" type="text" value="{{ old('title', $post->title ) }}"/>
                    </div>
                </div>
            </div>
            
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">excerpt -- đoạn trích</h2>
                    <textarea  class="height-80px" name="excerpt" cols="30" rows="10">{{ old('excerpt', $post->excerpt) }}</textarea>
                </div>
            </div>
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">content</h2>
                    <textarea name="content" id="editor1" class="h-100">{{ old('content', $post->content) }}</textarea>
                </div>
            </div>
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">meta description ( <span class="italic text-xs normal-case">* 入力しないたら内容部分からもらいます</span> )</h2>
                    <textarea class="height-80px" name="description" cols="30" rows="10">{{ old('description', $post->description) }}</textarea>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <section class="pb-4">
                        <h2 class="title text-center">bấm lưu mới post</h2>
                        <select name="public" class="js__single-select">
                            <option value="">chọn kiểu lưu</option>
                            <option @if(old('public', $post->public) == Config::get('constant.TYPE_SAVE.PUBLIC')) {{ 'selected' }} @endif
                            value="{{ Config::get('constant.TYPE_SAVE.PUBLIC') }}">
                                công khai
                            </option>
                            <option @if(old('public', $post->public) == Config::get('constant.TYPE_SAVE.ADMIN_READ')) {{ 'selected' }} @endif
                            value="{{ Config::get('constant.TYPE_SAVE.ADMIN_READ') }}">
                                {{-- chỉ admin xem --}}
                                アドミンだけ見えます。
                            </option>
                            
                        </select>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-save-data">
                                Lưu
                            </button>
                        </div>
                    </section>
                </div>
            </div>
            
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <section class="pb-4">
                        <h2 class="title text-center">chọn type hiện thị</h2>
                        <select name="type" class="js__single-select">
                            <option @if(old('type', $post->type) == Config::get('constant.TYPE-POST.DEFAULT')) {{ 'selected' }} @endif
                            value="{{ Config::get('constant.TYPE-POST.DEFAULT') }}">bài viết kiểu mặc định</option>
                            <option @if(old('type', $post->type) == Config::get('constant.TYPE-POST.RIGHT')) {{ 'selected' }} @endif
                            value="{{ Config::get('constant.TYPE-POST.RIGHT') }}">bài viết bên phải</option>
                            <option @if(old('type', $post->type) == Config::get('constant.TYPE-POST.LEFT')) {{ 'selected' }} @endif
                                value="{{ Config::get('constant.TYPE-POST.LEFT') }}">bài viết bên phải</option>
                        </select>
                    </section>
                </div>
            </div>
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <section class="pb-4">
                        <h2 class="title text-center">chọn branch</h2>
                        @if($branchs)
                        <select name="branch_id" class="js__single-select">
                            <option value="">chọn branch</option>
                            @foreach($branchs as $branch)
                            <option @if(old('branch_id', $post->branch_id) == $branch->id) {{ 'selected' }} @endif
                            value="{{ $branch->id }}">{{ $branch->title }}</option>
                            @endforeach
                        </select>
                        @endif
                    </section>
                </div>
            </div>
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <section class="pb-4 wrapper__selectImageWithCKFinder">
                        <h2 class="title text-center">thiết lập image</h2>
                        <div class="text-center">
                            <button type="button" onclick="selectImageWithCKFinder(this)"
                                class="btn btn-select-thumb">
                                Select image
                            </button>
                        </div>
                        <div class="group-control-img-ckfinder">
                            <input name="image" class="img__outputCKFinder thumbnail-topic mb-2" 
                                onblur="showImage__InputCKFinder( this.value, this )"
                                type="text" value="{{ old('image', $post->image) }}" />
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </form>
</div>


@endsection