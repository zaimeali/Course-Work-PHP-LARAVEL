@extends('layout')

@section('content')
    <h1>Edit Post:</h1>
    <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="post">
        @csrf
        @method('PUT')
        
        @include('posts._form')

        <button class="btn btn-primary btn-block" type="submit">Edit</button>
    </form>
@endsection