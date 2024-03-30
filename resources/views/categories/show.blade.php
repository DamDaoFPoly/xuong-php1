@extends('master')

@section('title')
    Chi tiết Category :{{ $category->name }}
@endsection

@section('content')
    <table class="table">
        <tr>
            <th>Trường</th>
            <th>Giá trị</th>
        </tr>
        {{-- ->toArray của inloqeun --}}
        @foreach ($category->toArray() as $key => $value)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $value }}</td>
            </tr>
        @endforeach
    </table>
    <a href="{{ route('categories.index', $key) }}" class="btn btn-info">Quay lại trang chủ</a>
    {{-- {{ $data->links() }} --}}
@endsection
