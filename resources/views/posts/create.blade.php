@extends('layout')

@section('content')
    <h1>Create Post:</h1>
    <form action="{{ route('posts.store') }}" method="post">
        @csrf

        @include('posts._form')

        <button class="btn btn-primary btn-block" type="submit">Create</button>
    </form>
@endsection