@extends('layout')

@section('content')
    <h1>Posts Title:</h1>
    @forelse ($posts as $post)
        <p>
            <h5>
                <a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a>
            </h5>
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