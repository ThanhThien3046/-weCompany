@extends('admin._layout')

@section('title', 'Thêm bài viết')

@section('page_title', 'danh sách bài đăng')

@section('javascripts')
    <script src="{{ asset('js/library/jquery.min.js') }}"></script>
    <script src="{{ asset('js/admin/app.min.js') }}"></script>
@endsection

@section('content_admin')
<div class="page__post-load admin-main-content">
    <div class="row block-content ">
        <div class="col-12 bg-white shadows-1 table-detail-request">
            <div class="row head">
                <div class="col-3">thông tin</div>
                <div class="col-9 wrap-break-word">Giá Trị tương Ứng</div>
            </div>
            <div class="row">
                <div class="col-3">id</div>
                <div class="col-9 wrap-break-word">{{ $contact->id }}</div>
            </div>
            <div class="row">
                <div class="col-3">first name</div>
                <div class="col-9 wrap-break-word">{{ $contact->first_name }}</div>
            </div>
            <div class="row">
                <div class="col-3">last name</div>
                <div class="col-9 wrap-break-word">{{ $contact->last_name }}</div>
            </div>
            <div class="row">
                <div class="col-3">email</div>
                <div class="col-9 wrap-break-word">{{ $contact->email }}</div>
            </div>
            <div class="row">
                <div class="col-3">mobile</div>
                <div class="col-9 wrap-break-word">{{ $contact->mobile }}</div>
            </div>
            <div class="row">
                <div class="col-3">fax</div>
                <div class="col-9 wrap-break-word">{{ $contact->fax }}</div>
            </div>
            <div class="row">
                <div class="col-3">job name</div>
                <div class="col-9 wrap-break-word">{{ $contact->job_name }}</div>
            </div>
            <div class="row">
                <div class="col-3">company</div>
                <div class="col-9 wrap-break-word">{{ $contact->company }}</div>
            </div>
            <div class="row">
                <div class="col-3">message</div>
                <div class="col-9 wrap-break-word">{{ $contact->message }}</div>
            </div>
            <div class="row">
                <div class="col-3">create</div>
                <div class="col-9 wrap-break-word">{{ Carbon::parse($contact->created_at)->format('l jS \\of F Y h:i:s A')  }}</div>
            </div>

            
            
            

            
        </div>
    </div>
</div>
@endsection
