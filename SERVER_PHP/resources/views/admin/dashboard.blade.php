@extends('admin._layout')

@section('title', 'WeCompany アドミン')
@section('page_title', 'Page dashboard - list request contact')

@section('javascripts')
    <script src="{{ asset('js/library/jquery.min.js') }}"></script>
    <script src="{{ asset('js/admin/app.min.js') }}"></script>
    <script>
        var ADMIN_DELETE_CONTACT = "{{ Route('ADMIN_DELETE_CONTACT', ['id' => null ])}}";
        function deleteComponent( id, element ){
            
            var result = confirm("削除してもよろしいですか")
            if(typeof ADMIN_DELETE_CONTACT == 'undefined'){
                showErrorSystem("ADMIN_DELETE_CONTACT")
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
                    url: ADMIN_DELETE_CONTACT + '/' +id , 
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

@section('content_admin')

<div class="page__dashboard page__post-load admin-main-content">
    <div class="row block-content ">
        <div class="col-12 bg-white search">
            <form class="form-inline" action="" method="GET">
                <label for="email">メール:</label>
                <input type="text" id="email" placeholder="メール" name="email"  value="{{ $query['email'] }}" />
                <button type="submit">条件で検索</button>
            </form>
        </div>
        <div class="col-12 bg-white shadows-1 px-3 py-3 table-list">
            <div class="row thead-list">
                <div class="col-1 text-center">id</div>
                <div class="col-2 text-center">名前</div>
                <div class="col-3 text-center">メール</div>
                <div class="col-1 text-center">メッセージ</div>
                <div class="col-2 text-center">電話</div>
                <div class="col-1 text-center">仕事名前</div>
                <div class="col-1 text-center">アドミン読む</div>
                <div class="col-1 text-center">削除</div>
            </div>
            @foreach( $contacts as $contact)
            <div class="row trow-list {{ $contact->read != Config::get('constant.CONTACT_ADMIN_READ') ? 'highlight' : null }}">
                <div class="col-1 text-center">{{ $contact->id }}</div>
                <div class="col-2 text-center single-line-truncation">{{ $contact->first_name . " " . $contact->last_name }}</div>
                <div class="col-3 text-center single-line-truncation">{{ $contact->email }}</div>
                <div class="col-1 text-center single-line-truncation">{{ $contact->message }}</div>
                <div class="col-2 text-center single-line-truncation">{{ $contact->mobile }}</div>
                <div class="col-1 text-center single-line-truncation">{{ $contact->job_name }}</div>
                <div class="col-1 text-center single-line-truncation">
                    <a href="{{ Route('ADMIN_CONTACT_DETAIL', [ 'id' => $contact->id ]) }}">
                        @if($contact->read != Config::get('constant.CONTACT_ADMIN_READ'))
                            see more
                        @else
                            seen
                        @endif
                    </a>
                </div>
                <div class="col-1 text-center single-line-truncation">
                    <button type="button"
                    onclick="deleteComponent('{{ $contact->id }}', this)"
                    class="bg-transparent btn-remove-row">
                        <i class="hero-icon hero-delete-variant"></i>
                    </button>
                </div>
                {{-- <div class="col-1 text-center single-line-truncation"></div> --}}
            </div>
            @endforeach

            <div class="pagi">
                {{ $contacts->onEachSide(3)->links() }}
            </div>

        </div>
    </div>
</div>
@endsection
