@extends('admin._layout')

@section('title', 'Thêm bài viết')

@php 
$showto = $post->showto ? $post->showto : Config::get('constant.LDJSON.HIDE');
$howto  = $post->howto ? $post->howto : null;
@endphp

@section('stylesheets')
<link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
@endsection
@section('javascripts')

    <script type="text/javascript" src="{{ asset('js/library/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/library/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/library/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/ckfinder/ckfinder.js') }}"></script>
    <script>CKFinder.config( { connectorPath: @json(route('ckfinder_connector')) } );</script>
    <script type="text/javascript" src="{{ asset('js/library/wanakana.min.js') }}"></script>
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
        <input type="hidden" name="_slug_old" value="{{ $post->slug }}">
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
                        <input class="jquery__append-out" name="title" type="text" value="{{ old('title', $post->title ) }}" onblur="isExistSlug(this.value)" />
                    </div>
                    <div class="input-control-link js-input-control">
                        <input class="mt-2 jquery__append-out" name="slug" type="text" value="{{ old('slug', $post->slug ) }}" readonly onblur="isExistSlug(this.value)"/>
                        <button type="button" class="btn__edit-slug" onclick="toggleEditSlugLink(this)">
                            <i id="js-toggle-icon-edit" class="hero-icon hero-shield-link-variant-outline"></i>
                            <i id="js-toggle-icon-key" class="hero-icon hero-shield-edit-outline d-none"></i>
                        </button>
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
                    <h2 class="title">site name SEO</h2>
                    <input name="site_name" type="text" value="{{ old('site_name', $post->site_name) }}" />
                </div>
            </div>
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">hình ảnh SEO</h2>
                    <div class="position-relative wrapper__selectImageWithCKFinder type-select-ckfinder__inline">
                        <input name="image" class="img__outputCKFinder jquery__append-out" type="text" 
                            value="{{ old('image', $post->image) }}" 
                            onblur="showImage__InputCKFinder( this.value, this )"/>
                        <button class="btn bg-cyan bd-cyan text-white btn-input-append" 
                        type="button" onclick="selectImageWithCKFinder(this)">chọn ảnh</button>
                    </div>
                </div>
            </div>
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">meta description ( <span class="italic text-xs normal-case">* nếu không nhập sẽ tự động lấy của phần nội dung</span> )</h2>
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
                                chỉ admin xem
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
                        <h2 class="title text-center">chọn type category</h2>
                        <select name="type" class="js__single-select">
                            <option @if(old('type', $post->type) == Config::get('constant.TYPE-POST.POST')) {{ 'selected' }} @endif
                            value="{{ Config::get('constant.TYPE-POST.POST') }}">post</option>
                            <option @if(old('type', $post->type) == Config::get('constant.TYPE-POST.PAGE')) {{ 'selected' }} @endif
                            value="{{ Config::get('constant.TYPE-POST.PAGE') }}">page</option>
                        </select>
                    </section>
                </div>
            </div>
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <section class="pb-4">
                        <h2 class="title text-center">chọn topic</h2>
                        {{-- @if($TOPICS)
                        <select name="topic_id" class="js__single-select">
                            <option value="">chọn topic</option>
                            @foreach($TOPICS as $topic)
                            <option @if(old('topic_id', $post->topic_id) == $topic->id) {{ 'selected' }} @endif
                            value="{{ $topic->id }}">{{ $topic->title }}</option>
                            @endforeach
                        </select>
                        @endif --}}
                    </section>
                </div>
            </div>
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <section class="pb-4">
                        <h2 class="title text-center">chọn tag</h2>
                        {{-- @if($TAGS)
                        <select name="tag_id[]" class="js__multi-select" multiple="multiple">
                            @foreach($TAGS as $tag)
                            <option @if(collect(old('tag_id', $tags_id ?? null ))->contains($tag->id)) {{ 'selected' }} @endif
                            value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>
                        @endif --}}
                    </section>
                </div>
            </div>
            
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <section class="pb-4 wrapper__selectImageWithCKFinder">
                        <h2 class="title text-center">thiết lập background</h2>
                        <div class="text-center">
                            <button type="button" onclick="selectImageWithCKFinder(this)"
                                class="btn btn-select-thumb">
                                Select background
                            </button>
                        </div>
                        <div class="group-control-img-ckfinder">
                            <input name="background" class="img__outputCKFinder thumbnail-topic mb-2" 
                                onblur="showImage__InputCKFinder( this.value, this )"
                                type="text" value="{{ old('background', $post->background) }}" />
                        </div>
                    </section>
                </div>
            </div>
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <section class="pb-4 wrapper__selectImageWithCKFinder">
                        <h2 class="title text-center">setup thumbnail</h2>
                        <div class="text-center">
                            <button type="button" onclick="selectImageWithCKFinder(this)"
                                class="btn btn-select-thumb">
                                Select Thumbnail
                            </button>
                        </div>
                        <div class="group-control-img-ckfinder">
                            <input name="thumbnail" class="img__outputCKFinder thumbnail-topic mb-2" 
                                onblur="showImage__InputCKFinder( this.value, this )"
                                type="text" value="{{ old('thumbnail', $post->thumbnail) }}" />
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </form>
    @if ($howto)
    <div class="row block-content">
                
        <div class="col-12 bg-color-white shadows-1 px-3 py-3 foundation">
            <div class='medium-12-columns'>
                <span id='valid_indicator' class='label'></span>
                <button type="button" id='js__save-json-textarea' class='tiny'>Lưu Json</button>
            </div>
            <div class='row'>
                {{-- @if($showto == Config::get('constant.LDJSON.HIDE')) d-none @endif --}}
                <div id='editor_holder' class='medium-12 columns'></div>
            </div>
        </div>
    </div>
    @endif
</div>


@endsection