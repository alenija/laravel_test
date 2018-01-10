@extends('layouts.app')

@section('title', 'Page Posts')

@section('content')
    <p><h1>All posts</h1></p>
    @foreach ($posts as $post)
        <p><h2>Id: {{ $post->id }}</h2></p>
        <p>Title: <a href="{{ route('posts.show', ['post' => $post]) }}">{{ $post->title }}</a></p>
        <p>Text: {{ $post->text }}</p>
        <p>Author: {{ $post->user['name'] }}</p>
    @endforeach
@endsection