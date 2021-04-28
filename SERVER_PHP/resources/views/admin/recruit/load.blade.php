@extends('admin._layout')

@section('title', 'insert recruit')

@section('javascripts')
    <script src="{{ asset('js/library/jquery.min.js') }}"></script>
    <script src="{{ asset('js/admin/app.min.js') }}"></script>
    <script>
        var ADMIN_DELETE_RECRUIT = "{{ Route('ADMIN_DELETE_RECRUIT', ['id' => null ])}}";
        function deleteComponent( id, element ){

            var result = confirm("Có chắc muốn xóa không?")
            if(typeof ADMIN_DELETE_RECRUIT == 'undefined'){
                
                showErrorSystem("ADMIN_DELETE_RECRUIT")
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
                    url: ADMIN_DELETE_RECRUIT + '/' +id , 
                    data : {},
                    dataType:"JSON",
                    success: function(response){
                        if(response.status == 200){
                            $( element ).closest('.row').remove();
                        }else{
                            alert("削除できません。")
                        }
                    },
                    error: function(){
                        alert("削除できません。")
                    },
                });
            }
        }
    </script>
@endsection


@section('page_title', '募集情報リスト' )

@section('content_admin')
<div class="page__topic admin-main-content">

    <div class="row block-content">
        <div class="col-12 bg-white search">
            <form class="form-inline" action="" method="GET">
                <label for="branch">話題:</label>
                <select name="branch">
                    <option value="0">支店を選んでください</option>
                    @foreach ($branchs as $branch)
                    <option value="{{$branch->id}}" {{ $query['branch'] == $branch->id ? "selected": null }}>
                        {{$branch->title}}
                    </option>
                    @endforeach
                </select>
                <button type="submit">探します</button>
            </form>
        </div>
        <div class="col-12 bg-white shadows-1 px-3 py-3 table-list">
            <div class="row thead-list">
                <div class="col-1 text-center">id</div>
                <div class="col-4">title</div>
                <div class="col-6 text-center">description</div>
                <div class="col-1 text-center">remove</div>
            </div>
            @foreach( $recruits as $recruit)
            <div class="row trow-list">
                <div class="col-1 text-center">{{ $recruit->id }}</div>
                <div class="col-4">
                    <a href="{{ Route("ADMIN_STORE_RECRUIT", ['id' =>  $recruit->id]) }}">
                        {{ $recruit->title }}
                    </a>
                </div>
                <div class="col-6">{!! strip_tags($recruit->content) !!}</div>
                <div class="col-1">
                    <button type="button"
                    onclick="deleteComponent('{{ $recruit->id }}', this)"
                    class="bg-transparent btn-remove-row">
                        <i class="hero-icon hero-delete-variant"></i>
                    </button>
                </div>
            </div>
            @endforeach

            <div class="pagi">
                {{ $recruits->onEachSide(3)->links() }}
            </div>

        </div>
    </div>
</div>
@endsection
