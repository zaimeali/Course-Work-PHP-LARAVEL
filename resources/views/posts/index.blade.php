@extends('layout')

@section('content')
    <h1>Posts Title:</h1>
    @forelse ($posts as $post)
        <p>
            <h4>
                <a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a>
            </h4>
            <a href="{{ route('posts.edit', ['post' => $post->id]) }}">Edit Post</a>
            <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Delete Post</button>
            </form>
            <hr>
        </p>
    @empty
        <p>No Posts!</p>
    @endforelse
    {{-- @foreach ($posts as $post)
        <p>
            <h4>{{ $post->title }}</h4>
        </p>
    @endforeach --}}
@endsection