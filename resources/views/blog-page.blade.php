@extends('layout')

@section('title')
    Blog Page
@endsection

@section('content')
    <p>On Blog Page</p>
    {!! $data['title'] !!}
@endsection