@extends('admin._layout')

@section('title', 'WeCompany Admin')
@section('page_title', 'Page dashboard - list request contact')

@section('javascripts')
    <script src="{{ asset('js/library/jquery.min.js') }}"></script>
    <script src="{{ asset('js/admin/app.min.js') }}"></script>
    <script>
        var ADMIN_DASHBOARD_DELETE = "{{ Route('ADMIN_DASHBOARD', ['id' => null ])}}";
        function deleteComponent( id, element ){
            
            // var result = confirm("Có chắc muốn xóa không?")
            if(typeof ADMIN_DASHBOARD_DELETE == 'undefined'){
                showErrorSystem("ADMIN_DASHBOARD")
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
                    url: ADMIN_DASHBOARD + '/' +id , 
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
                <label for="email">email:</label>
                <input type="text" id="email" placeholder="email" name="email"  value="{{ $query['email'] }}" />
                <button type="submit">Search by condition</button>
            </form>
        </div>
        <div class="col-12 bg-white shadows-1 px-3 py-3 table-list">
            <div class="row thead-list">
                <div class="col-1 text-center">id</div>
                <div class="col-2 text-center">name</div>
                <div class="col-3 text-center">email</div>
                <div class="col-1 text-center">message</div>
                <div class="col-2 text-center">mobile</div>
                <div class="col-1 text-center">job name</div>
                <div class="col-1 text-center">admin read</div>
                <div class="col-1 text-center">delete</div>
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
                    <a href="{{ Route('ADMIN_POST_LOGIN', [ 'id' => $contact->id ]) }}">
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




