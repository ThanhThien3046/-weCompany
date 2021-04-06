@extends('admin._layout')

@section('title', 'Trang Quản Trị')
@section('javascripts')
    <script src="{{ asset('js/library/jquery.min.js') }}"></script>
    <script src="{{ asset('js/admin/app.min.js') }}"></script>
@endsection

@section('content_admin')
<div class="page__dashboard">
    dashboard! hello admin
</div>
@endsection


@section('page_title', 'Page dashboard')

