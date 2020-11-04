@extends('layout')

@section('content')
    <h1 class="text-2xl">Post Title</h1>
    <hr>
    @forelse ($posts as $post)
        <p>
            <h4>
                <a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a>
            </h4>
            @if ($post->comments_count)
                <p>{{ $post->comments_count }} comments</p>
            @else
                <p class="text-gray-500 text-sm">No comments yet</p>
            @endif
            <div class="d-flex">
                <a class="btn btn-primary mr-3" href="{{ route('posts.edit', ['post' => $post->id]) }}">Edit Post</a>
                <form 
                    action="{{ route('posts.destroy', ['post' => $post->id]) }}" 
                    method="post"
                    class="fm-inline"
                >
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-secondary" type="submit">Delete Post</button>
                </form>
            </div>
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