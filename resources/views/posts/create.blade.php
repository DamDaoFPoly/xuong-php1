@extends('master');

@section('title')
    Thêm Bài Post
@endsection

@section('content')
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        CATEGORY_ID
        {{-- <input type="text" name="category_id" id=""> --}}
        <section name="category_id">
            @foreach ($data as $item)
            {{ $item->name }}
                {{-- <option value="{{$item->id}}">{{ $item->name }}</option> --}}
            @endforeach
        </section>
        AUTHOR_ID
        <input type="text" name="author_id" id="">
        TITLE
        <input type="text" name="title" id="">
        EXCERPT
        <input type="text" name="excerpt" id="">
        CONTENT
        <input type="text" name="content" id="">
        <button type="submit" class="btn btn-success">Save</button>

    </form>
@endsection
