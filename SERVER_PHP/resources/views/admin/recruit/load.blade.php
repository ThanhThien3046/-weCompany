@extends('admin._layout')

@section('title', 'ポスト追加')

@section('javascripts')
    <script src="{{ asset('js/library/jquery.min.js') }}"></script>
    <script src="{{ asset('js/admin/app.min.js') }}"></script>
    <script src="{{ asset('js/library/select2.min.js') }}"></script>
    <script>
        var ADMIN_DELETE_RECRUIT = "{{ Route('ADMIN_DELETE_RECRUIT', ['id' => null ])}}";
        function deleteComponent( id, element ){

            var result = confirm("削除しますか")
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
                <label for="branch">話題:</label>
                <select name="branch">
                    <option value="0">支店を選んでください</option>
                    @foreach ($branchs as $branch)
                    <option value="{{$branch->id}}" {{ $query['branch'] == $branch->id ? "selected": null }}>
                        {{$branch->title}}
                    </option>
                    @endforeach
                </select>
                <label for="post">ポスト:</label>
                <input type="text" id="post" placeholder="ポストのタイトルを入力してください" name="post"  value="{{ $query['recruit'] }}" />
                <button type="submit">探します</button>
            </form>
        </div>
        <div class="col-12 bg-white shadows-1 px-3 py-3 table-list">
            <div class="row thead-list">
                <div class="col-0 text-center">id</div>
                {{-- <div class="col-1 text-center">recruit_num</div> --}}
                <div class="col-4 text-center">title</div>
                <div class="col-2 text-center">content</div>
                <div class="col-3 text-center">group - branch</div>
                {{-- <div class="col-1 text-center">public</div> --}}
                <div class="col-2 text-center">remove</div>
            </div>
            @foreach( $recruits as $recruit)
            <div class="row trow-list {{ $recruit->public == Config::get('constant.TYPE_SAVE.ADMIN_READ') ? 'highlight' : null }}">
                <div class="col-1">{{ $recruit->recruit_id }}</div>
                <div class="col-1 trow_list__wrapper_image">
                    {{-- <div class="col-1">{{ $recruit->content }}</div> --}}
                    {{-- <img class="item_image" src="{{ asset($recruit->content) }}" /> --}}
                </div>
                <div class="col-3">
                    <a href="{{ Route("ADMIN_STORE_RECRUIT", ['id' =>  $recruit->id]) }}">
                        {{ $recruit->getTitle(60) }}
                    </a>
                </div>
                {{-- <div class="col-1">{{ $post->getType()  }}</div> --}}
                @php 
                $branch = $recruit->branch;
                if(!$branch){
                    $titleBranch = 'no choose branch';
                }else{
                    $titleBranch = $branch->title;
                }
                @endphp
                {{-- <div class="col-2">{{ $titleBranch }}</div> --}}
                <div class="col-2">{{ $recruit->content }}</div>
                {{-- <div class="col-1">{{ $recruit->public == Config::get('constant.TYPE_SAVE.PUBLIC') ? 'show' : 'admin' }}</div> --}}
                <div class="col-3">{{ $titleBranch }}</div>
                <div class="col-1">
                    <button type="button"
                    onclick="deleteComponent('{{ $recruit->recruit_id }}', this)"
                    class="bg-transparent btn-remove-row">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            @endforeach

            {{-- <div class="pagi">
                {{ $recruit->onEachSide(3)->links() }}
            </div> --}}

        </div>
    </div>
</div>
@endsection
