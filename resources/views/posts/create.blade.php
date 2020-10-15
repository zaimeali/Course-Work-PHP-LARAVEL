@extends('layout')

@section('content')
    <h1>Create Post:</h1>
    <form action="{{ route('posts.store') }}" method="post">
        @csrf

        <p>
            <label for="title">
                <span>Title:</span> 
                <input name="title" type="text" id="title" value="{{ old('title') }}">
            </label>
        </p>
        <p>
            <label for="content">
                <span>Content:</span> 
                <textarea name="content" id="content">
                    {{ old('content') }}
                </textarea>
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