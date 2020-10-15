@extends('layout')

@section('content')
    <h1>Create Post:</h1>
    <form action="{{ route('posts.store') }}" method="post">
        @csrf

        <p>
            <label for="title">
                Title: <input name="title" type="text" id="title">
            </label>
        </p>
        <p>
            <label for="content">
                Content: <textarea name="content" id="content"></textarea>
            </label>
        </p>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button type="submit">Create</button>
    </form>
@endsection