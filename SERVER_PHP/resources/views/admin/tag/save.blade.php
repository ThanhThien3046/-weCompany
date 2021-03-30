@extends('admin._layout')

@section('title', 'Thêm tag')

@section('javascripts')
    <script src="{{ asset('js/library/jquery.min.js') }}"></script>
    <script src="{{ asset('js/library/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/library/select2.min.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/ckfinder/ckfinder.js') }}"></script>
    <script>CKFinder.config( { connectorPath: @json(route('ckfinder_connector')) } );</script>
    <script src="{{ asset('js/admin/validate.tag.min.js') }}"></script>
    <script src="{{ asset('js/admin/app.min.js') }}"></script>
    
@endsection



@section('page_title', $tag->id ? 'chỉnh sửa Tag' : 'thêm mới Tag' )

@section('content_admin')
<div class="page__tag admin-main-content">

    <div class="row">
        <div class="col-12">
            @if (Session::has(Config::get('constant.SAVE_ERROR')))
            <div class="alert alert-warning">
                {{ Session::get(Config::get('constant.SAVE_ERROR')) }}
            </div>
            @elseif (Session::has(Config::get('constant.SAVE_SUCCESS')))
            <div class="alert alert-success">
                lưu tag thành công
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
    <form class="row js-validate-form" action="{{ Route('ADMIN_SAVE_TAG', ['id' => $tag->id]) }}" method="POST">
        {!! csrf_field() !!}
        <input type="hidden" name="_slug_old" value="{{ $tag->slug }}">
        <div class="col-md-8">
            <div class="row block-content">
                <div class="js-parent__create-slug col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">tên tag</h2>
                    <div class="input-control-link">
                        <input class="jquery__append-out" name="title" type="text" value="{{ old('title', $tag->title ) }}" onblur="isExistSlug(this.value)" />
                    </div>
                    <div class="input-control-link js-input-control">
                        <input class="mt-2 jquery__append-out" name="slug" type="text" value="{{ old('slug', $tag->slug ) }}" readonly onblur="isExistSlug(this.value)"/>
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
                    <textarea  class="height-80px" name="excerpt" cols="30" rows="10">{{ old('excerpt', $tag->excerpt) }}</textarea>
                </div>
            </div>
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">content</h2>
                    <textarea name="content" id="editor1" class="h-100">{{ old('content', $tag->content) }}</textarea>
                </div>
            </div>
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">site name SEO</h2>
                    <input name="site_name" type="text" value="{{ old('site_name', $tag->site_name) }}" />
                </div>
            </div>
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">hình ảnh SEO</h2>
                    <div class="position-relative wrapper__selectImageWithCKFinder type-select-ckfinder__inline">
                        <input name="image" class="img__outputCKFinder jquery__append-out" type="text" 
                            value="{{ old('image', $tag->image) }}" 
                            onblur="showImage__InputCKFinder( this.value, this )"/>
                        <button class="btn bg-cyan bd-cyan text-white btn-input-append" 
                        type="button" onclick="selectImageWithCKFinder(this)">chọn ảnh</button>
                    </div>
                </div>
            </div>
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <h2 class="title">meta description</h2>
                    <textarea class="height-80px" name="description" cols="30" rows="10">{{ old('description', $tag->description) }}</textarea>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row block-content">
                <div class="col-12 bg-color-white shadows-1 px-3 py-3">
                    <section class="pb-4">
                        <h2 class="title text-center">bấm lưu mới tag</h2>
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
                    <section class="pb-4 wrapper__selectImageWithCKFinder">
                        <h2 class="title text-center">thiết lập background</h2>
                        <div class="text-center">
                            <button type="button" onclick="selectImageWithCKFinder(this)"
                                class="btn btn-select-thumb">
                                Select background
                            </button>
                        </div>
                        <div class="group-control-img-ckfinder">
                            <input name="background" class="img__outputCKFinder thumbnail-topic pb-2" 
                                onblur="showImage__InputCKFinder( this.value, this )"
                                type="text" value="{{ old('background', $tag->background) }}" />
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
                            <input name="thumbnail" class="img__outputCKFinder thumbnail-topic pb-2" 
                                onblur="showImage__InputCKFinder( this.value, this )"
                                type="text" value="{{ old('thumbnail', $tag->thumbnail) }}" />
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection