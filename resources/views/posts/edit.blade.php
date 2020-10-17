@extends('layout')

@section('content')
    <h1>Edit Post:</h1>
    <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="post">
        @csrf
        @method('PUT')
        <p>
            <label for="title">
                <span>Edit Title:</span> 
                {{-- old(name_of_the_field, default_value) --}}
                <input name="title" type="text" id="title" value="{{ old('title', $post->title) }}">
            </label>
        </p>
        <p>
            <label for="content">
                <span>Edit Content:</span> 
                <textarea name="content" id="content">
                    {{ old('content', $post->content) }}
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

        <button type="submit">Edit</button>
    </form>
@endsection