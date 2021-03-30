@extends('admin._layout')

@section('title', 'Thêm bài viết')

@section('javascripts')
    <script src="{{ asset('js/library/jquery.min.js') }}"></script>
    <script src="{{ asset('js/admin/app.min.js') }}"></script>
    <script>
        var ADMIN_DELETE_USER = "{{ Route('ADMIN_DELETE_USER', ['id' => null ])}}";
        function deleteComponent( id, element ){

            var result = confirm("Có chắc muốn xóa không?")
            if(typeof ADMIN_DELETE_USER == 'undefined'){
                
                showErrorSystem("ADMIN_DELETE_USER")
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
                    url: ADMIN_DELETE_USER + '/' +id , 
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


@section('page_title', 'danh sách user' )

@section('content_admin')
<div class="page__user admin-main-content">

    <div class="row block-content">
        <div class="col-12 bg-white shadows-1 px-3 py-3 table-list">
            <div class="row thead-list">
                <div class="col-1">image</div>
                <div class="col-2">name</div>
                <div class="col-3">email</div>
                <div class="col-1">quyền</div>
                <div class="col-1">#remove#</div>
            </div>
            @foreach( $users as $user)
            <div class="row trow-list">
                <div class="col-1 trow_list__wrapper_image">
                    <img class="item_image" src="{{ $user->background }}" />
                </div>
                <div class="col-2">
                    <a href="{{ Route("ADMIN_STORE_USER", ['id' =>  $user->id]) }}">
                        {{ $user->getName(30) }}
                    </a>
                </div>
                <div class="col-3">{{ $user->email }}</div>
                <div class="col-1">
                    <a href="{{ }}">permission</a>    
                </div>
                <div class="col-1">
                    <button type="button"
                    onclick="deleteComponent('{{ $user->id }}', this)"
                    class="bg-transparent btn-remove-row">
                        <i class="hero-icon hero-delete-variant"></i>
                    </button>
                </div>
            </div>
            @endforeach

            <div class="pagi">
                {{ $users->onEachSide(3)->links() }}
            </div>

        </div>
    </div>
</div>
@endsection
