@extends('master')

@section('title')
    Danh sách Category
@endsection

@section('content')
    {{-- <a href="{{ route('categories.create') }}" class="btn btn-info mb-3">Create</a> --}}
    <div class="row">
        <div class="col-md-4">
            <a class="btn btn-primary mt-2 mb-2" href="{{ route('categories.create') }}">Create</a>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="{{ route('categories.index') }}">
                <div class="mt-2 mb-2">
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" name="keyword" id="keyword" value="{{ request('keyword') }}"
                                placeholder="Keyword" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Name</th>
            {{-- <th>C</th> --}}
            <th>Action</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
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
