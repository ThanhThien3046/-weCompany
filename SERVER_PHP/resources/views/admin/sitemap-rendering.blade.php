@extends('admin._layout')

@section('title', 'Trang Quản Trị')
@section('javascripts')
    <script src="{{ asset('js/library/jquery.min.js') }}"></script>
    <script src="{{ asset('js/admin/app.min.js') }}"></script>
@endsection

@section('content_admin')
<div class="page__sitemap rendering">
    <div class="link pt-4">
        <span>link site map: </span>
        <a  target="_blank" href="{{ asset($path) }}">{{ asset($path) }}</a>
    </div>
    
    <div class="link pt-4">
        <span>bấm vào đây để render site map ngày hiện tại: </span>
        <div>
            <a  target="_blank" href="{{ Route('ADMIN_STORE_SITEMAP') }}?today=1">
                lưu sitemap ngày hiện tại
            </a>
        </div>
    </div>
    
</div>
@endsection


@section('page_title', 'Trang dashboard nè')

