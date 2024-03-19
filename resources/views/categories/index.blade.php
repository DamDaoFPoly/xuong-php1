@extends('master')

@section('title')
    Danh sách Category
@endsection

@section('content')
    <a href="{{ route('categories.create') }}" class="btn btn-info mb-3">Create</a>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            {{-- <th>C</th> --}}
            <th>Action</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td class="d-flex">
                    <a href="{{ route('categories.show', $item->id) }}" class="btn btn-info">Show</a>
                    <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('categories.destroy', $item->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Chắc chắn xóa không?')" class="btn btn-danger"
                            type="submit">Delete</button>
                    </form>


                </td>

            </tr>
        @endforeach
    </table>

    {{ $data->links() }}
@endsection
