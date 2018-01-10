@extends('layouts.app')

@section('title', 'Page Post')

@section('content')
    <p><h1>{{ $post->title }}</h1></p>
    <p>Text: {{ $post->text }}</p>
    <p>Author: <i>{{ $post->user['name'] }}</i></p>
    @if (auth()->check())
        @if (auth()->user()->isAdmin())
            <a href="{{ route('posts.edit', ['post' => $post]) }}">Edit </a>
            <a href="{{ route('posts.destroy', ['post' => $post]) }}">Remove</a>
        @endif
     @endif
     @endsection