@extends('layouts.app')

@section('title', 'Page Post')

@section('content')

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

    <p><h1>{{ $post->title }}</h1></p>
    {{-- for many to many --}}
    {{--@foreach ($post['category'] as $category)--}}
        {{--<p>Category: {{ $category['name'] }}</p>--}}
    {{--@endforeach--}}
    <p>Category: {{ $post->category['name'] }}</p>
    <p>Text: {{ $post->text }}</p>
    <p>Author: <i>{{ $post->user['name'] }}</i></p>
    @if (auth()->check())
        @if (auth()->user()->isAdmin())
            {{--<a href="{{ route('posts.edit', ['post' => $post]) }}">Edit </a>--}}
            <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
            <a href="{{ route('posts.destroy', ['post' => $post]) }}">Remove</a>
        @endif
     @endif
 @endsection