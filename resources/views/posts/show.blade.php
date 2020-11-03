@extends('layout')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <hr>
    {{-- Carbon Function: diffForHumans --}}
    <p>Added {{ $post->created_at->diffForHumans() }}</p>

    @if ($post->id === 1)
        <p>Post One</p>
    @elseif ($post->id === 2)
        <p>Post Two</p>
    @else
        <p>Something Else</p>
    @endif

    {{-- Checking Condition through minutes for new post --}}
    @if ((new Carbon\Carbon())->diffInMinutes($post->created_at) < 10)
        <strong>New Post</strong>
    @endif

    <hr>

    <h4>Comments</h4>
    @forelse ($post->comments as $comment)
        <p>{{ $comment->content }} <span class="text-muted">- <small>{{ $comment->created_at->diffForHumans() }}</small></span></p>
    @empty
        <p style="color: red">No Comment</p>
    @endforelse
@endsection