@extends('admin._layout')

@section('title', 'Thêm bài viết')

@section('javascripts')
    <script src="{{ asset('js/library/jquery.min.js') }}"></script>
    <script src="{{ asset('js/admin/app.min.js') }}"></script>
    <script src="{{ asset('js/library/select2.min.js') }}"></script>
    <script>
        var ADMIN_DELETE_POST = "{{ Route('ADMIN_DELETE_POST', ['id' => null ])}}";
        function deleteComponent( id, element ){

            var result = confirm("Có chắc muốn xóa không?")
            if(typeof ADMIN_DELETE_POST == 'undefined'){
                
                showErrorSystem("ADMIN_DELETE_POST")
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

@section('page_title', 'ポストのリスト')

@section('content_admin')
<div class="page__post-load admin-main-content">
    <div class="row block-content ">
        <div class="col-12 bg-white search">
            <form class="form-inline" action="" method="GET">
                <label for="branch">カテゴリー:</label>
                <select name="branch">
                    <option value="0">カテゴリーを選んでください</option>
                    @foreach ($branchs as $branch)
                    <option value="{{$branch->id}}" {{ $query['branch'] == $branch->id ? "selected": null }}>
                        {{$branch->title}}
                    </option>
                    @endforeach
                </select>
                <label for="post">投稿:</label>
                <input type="text" id="post" placeholder="ポストのタイトルを入力してください" name="post"  value="{{ $query['post'] }}" />
                <button type="submit">探します</button>
            </form>
        </div>
        <div class="col-12 bg-white shadows-1 px-3 py-3 table-list">
            <div class="row thead-list">
                <div class="col-1 text-center">id</div>
                <div class="col-1 text-center">イメージ</div>
                <div class="col-5 ">タイトル</div>
                <div class="col-1 ">タイプ</div>
                <div class="col-2 text-center">投稿グループ</div>
                <div class="col-1 text-center">公開状態</div>
                <div class="col-1 text-center">削除</div>
            </div>
            @foreach( $posts as $post)
            <div class="row trow-list {{ $post->public == Config::get('constant.TYPE_SAVE.ADMIN_READ') ? 'highlight' : null }}">
                <div class="col-1">{{ $post->id }}</div>
                <div class="col-1 trow_list__wrapper_image">
                    <img class="item_image" src="{{ asset($post->image) }}" />
                </div>
                <div class="col-5">
                    <a href="{{ Route("ADMIN_STORE_POST", ['id' =>  $post->id]) }}">
                        {{ $post->getTitle(60) }}
                    </a>
                </div>
                <div class="col-1">{{ $post->getType()  }}</div>
                @php 
                $branch = $post->branch;
                if(!$branch){
                    $titleBranch = 'no choose branch';
                }else{
                    $titleBranch = $branch->title;
                }
                @endphp
                <div class="col-2 text-center">{{ $titleBranch }}</div> 
                <div class="col-1 text-center">{{ $post->public == Config::get('constant.TYPE_SAVE.PUBLIC') ? 'show' : 'admin' }}</div>
                <div class="col-1 text-center">
                    <button type="button"
                    onclick="deleteComponent('{{ $post->id }}', this)"
                    class="bg-transparent btn-remove-row">
                        <i class="hero-icon hero-delete-variant"></i>
                    </button>
                </div>
            </div>
            @endforeach

            <div class="pagi">
                {{ $posts->onEachSide(3)->links() }}
            </div>

        </div>
    </div>
</div>
@endsection
