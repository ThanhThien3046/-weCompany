@extends('admin._layout')

@section('title', 'Thêm bài viết')

@section('javascripts')
    <script src="{{ asset('js/library/jquery.min.js') }}"></script>
    <script src="{{ asset('js/admin/app.min.js') }}"></script>
    <script>
        var ADMIN_DELETE_POST = "{{ Route('ADMIN_DELETE_TAG', ['id' => null ])}}";
        function deleteComponent( id, element ){

            var result = confirm("Có chắc muốn xóa không?")
            if(typeof ADMIN_DELETE_POST == 'undefined'){
                
                showErrorSystem("ADMIN_DELETE_TAG")
            }
            if (result) {
                /// delete
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });
                $.ajax({
                    type: "DELETE",
                    url: ADMIN_DELETE_POST + '/' +id , 
                    data : {},
                    dataType:"JSON",
                    success: function(response){
                        if(response.status == 200){
                            $( element ).closest('.row').remove();
                        }
                    }
                });
            }
        }
    </script>
@endsection


@section('page_title', 'danh sách tag')

@section('content_admin')
<div class="page__tag-load admin-main-content">
    
    <div class="row block-content">
        <div class="col-12 bg-white shadows-1 px-3 py-3 table-list">
            <div class="row thead-list">
                <div class="col-1">image</div>
                <div class="col-4">title</div>
                <div class="col-3">link</div>
                <div class="col-3">description</div>
                <div class="col-1">#remove#</div>
            </div>
            @foreach( $tags as $tag)
            <div class="row trow-list">
                <div class="col-1 trow_list__wrapper_image">
                    <img class="item_image" src="{{ $tag->image }}" />
                </div>
                <div class="col-4">
                    <a href="{{ Route("ADMIN_STORE_TAG", ['id' =>  $tag->id]) }}">
                        {{ $tag->getTitle(30) }}
                    </a>
                </div>
                <div class="col-3"><a href="{{ Route('TAG_VIEW', ['slug' => $tag->slug ]) }}">{{ $tag->slug }}</a></div>
                <div class="col-3">{{ $tag->getDescriptionSeo(90) }}</div>
                <div class="col-1">
                    <button type="button"
                    onclick="deleteComponent('{{ $tag->id }}', this)"
                    class="bg-transparent btn-remove-row">
                        <i class="hero-icon hero-delete-variant"></i>
                    </button>
                </div>
            </div>
            @endforeach

            <div class="pagi">
                {{ $tags->onEachSide(3)->links() }}
            </div>

        </div>
    </div>
</div>
@endsection
