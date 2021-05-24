@extends('admin._layout')

@section('title', '新規追加')

@section('page_title', '投稿一覧')

@section('javascripts')
    <script src="{{ asset('js/library/jquery.min.js') }}"></script>
    <script src="{{ asset('js/admin/app.min.js') }}"></script>
@endsection

@section('content_admin')
<div class="page__post-load admin-main-content">
    <div class="row block-content ">
        <div class="col-12 bg-white shadows-1 table-detail-request">
            <div class="row head">
                <div class="col-3">情報</div>
                <div class="col-9 wrap-break-word">内容</div>
            </div>
            <div class="row">
                <div class="col-3">id</div>
                <div class="col-9 wrap-break-word">{{ $contact->id }}</div>
            </div>
            <div class="row">
                <div class="col-3">姓</div>
                <div class="col-9 wrap-break-word">{{ $contact->first_name }}</div>
            </div>
            <div class="row">
                <div class="col-3">名</div>
                <div class="col-9 wrap-break-word">{{ $contact->last_name }}</div>
            </div>
            <div class="row">
                <div class="col-3">メール</div>
                <div class="col-9 wrap-break-word">{{ $contact->email }}</div>
            </div>
            <div class="row">
                <div class="col-3">電話</div>
                <div class="col-9 wrap-break-word">{{ $contact->mobile }}</div>
            </div>
            <div class="row">
                <div class="col-3">ファックス</div>
                <div class="col-9 wrap-break-word">{{ $contact->fax }}</div>
            </div>
            <div class="row">
                <div class="col-3">職種名</div>
                <div class="col-9 wrap-break-word">{{ $contact->job_name }}</div>
            </div>
            <div class="row">
                <div class="col-3">会社</div>
                <div class="col-9 wrap-break-word">{{ $contact->company }}</div>
            </div>
            <div class="row">
                <div class="col-3">メッセージ</div>
                <div class="col-9 wrap-break-word">{{ $contact->message }}</div>
            </div>
            <div class="row">
                <div class="col-3">作成する</div>
                <div class="col-9 wrap-break-word">{{ Carbon::parse($contact->created_at)->format('l jS \\of F Y h:i:s A')  }}</div>
            </div>

            
            
            

            
        </div>
    </div>
</div>
@endsection
