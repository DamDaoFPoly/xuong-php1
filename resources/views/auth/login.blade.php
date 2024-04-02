@extends('master')

@section('content')
    <h1>Login</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        {{-- <div class="mt-2 mb2">
            <label for="">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div> --}}
        <div class="mt-2 mb2">
            <label for="">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="mt-2 mb2">
            <label for="">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
@endsection
