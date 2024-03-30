@extends('master')

@section('title')
    Danh sách Posts
@endsection

@section('content')
    <div class="container">
        <a class="btn btn-danger" href="{{ route('posts.create') }}">Create</a>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>CATEGORY_ID</th>
                <th>AUTHOR_ID</th>
                <th>TITLE</th>
                <th>EXCERPT</th>
                <th>IMG_THUMBNAIL</th>
                <th>IMG_COVER</th>
                <th>CONTENT</th>
                <th>IS_TRENDING</th>
                <th>VIEW_COUNT</th>
                <th>STATUS</th>
                <th>ACTION</th>
                {{-- <th></th> --}}
            </tr>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->category_id }}</td>
                    <td>{{ $item->author_id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->excerpt }}</td>
                    <td>{{ $item->img_thumbnail }}</td>
                    <td>{{ $item->img_cover }}</td>
                    <td>{{ $item->content }}</td>
                    <td>{{ $item->is_trending }}</td>
                    <td>{{ $item->view_count }}</td>
                    <td>{{ $item->status }}</td>
                    <td>


                        <form action="{{ route('posts.destroy', $item->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-light" onclick="return confirm('Are you sure?')" href="">DELETE</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $data->links() }}
    </div>
@endsection
{{-- php artisan db:seed --class=Post --}}
