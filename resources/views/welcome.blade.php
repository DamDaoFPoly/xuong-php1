@extends('master')

@section('content')
    <h1>Trang Chủ</h1>

    <a href="{{ route('sigup-form') }}" class="btn btn-primary">Đăng ký</a>
    <a href="{{ route('login-form') }}" class="btn btn-warning">Đăng Nhập</a>
@endsection
