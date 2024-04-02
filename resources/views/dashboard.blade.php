@extends('master')

@section('content')
    <h1>Dashboard: Chào mừng {{\Auth::user()->name}}</h1>
    {{-- @dd(\Auth::user()->name) --}}
    <p>Đăng nhập để truy cập</p>

    <a href="{{ route('logout') }}" onclick="return alert('Aree you sure?')" class="btn btn-danger">Đăng Xuất</a>

@endsection
