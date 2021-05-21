@extends('admin._layout')

@section('title', '新規追加')

@section('javascripts')
    <script src="{{ asset('js/library/jquery.min.js') }}"></script>
    <script src="{{ asset('js/admin/app.min.js') }}"></script>
    <script>
        var ADMIN_DELETE_BRANCH = "{{ Route('ADMIN_DELETE_BRANCH', ['id' => null ])}}";
        function deleteComponent( id, element ){

            var result = confirm("削除してもよろしいですか")
            if(typeof ADMIN_DELETE_BRANCH == 'undefined'){
                
                showErrorSystem("ADMIN_DELETE_BRANCH")
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
                    url: ADMIN_DELETE_BRANCH + '/' +id , 
                    data : {},
                    dataType:"JSON",
                    success: function(response){
                        if(response.status == 200){
                            $( element ).closest('.row').remove();
                        }else{
                            alert("xoá thất bại nha")
                        }
                    },
                    error: function(){
                        alert("xoá thất bại nha")
                    },
                });
            }
        }
    </script>
@endsection


@section('page_title', '支店リスト' )

@section('content_admin')
<div class="page__topic admin-main-content">

    <div class="row block-content">
        <div class="col-12 bg-white shadows-1 px-3 py-3 table-list">
            <div class="row thead-list">
                <div class="col-1 text-center">id</div>
                <div class="col-1 text-center">image</div>
                <div class="col-3 text-center">title</div>
                <div class="col-6 text-center">description</div>
                <div class="col-1 text-center">remove</div>
            </div>
            @foreach( $branchs as $branch)
            <div class="row trow-list">
                <div class="col-1 text-center">{{ $branch->id }}</div>
                <div class="col-1 trow_list__wrapper_image">
                    <img class="item_image" src="{{ $branch->image }}" />
                </div>
                <div class="col-3">
                    <a href="{{ Route("ADMIN_STORE_BRANCH", ['id' =>  $branch->id]) }}">
                        {{ $branch->title }}
                    </a>
                </div>
                <div class="col-6">{{$branch->description}}</div>
                <div class="col-1">
                    <button type="button"
                    onclick="deleteComponent('{{ $branch->id }}', this)"
                    class="bg-transparent btn-remove-row">
                        <i class="hero-icon hero-delete-variant"></i>
                    </button>
                </div>
            </div>
            @endforeach

            <div class="pagi">
                {{ $branchs->onEachSide(3)->links() }}
            </div>

        </div>
    </div>
</div>
@endsection
