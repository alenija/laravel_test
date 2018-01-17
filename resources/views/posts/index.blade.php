@extends('layouts.app')
{{--@extends('layout')--}}

@section('title', 'Page Posts')

@section('content')

    <div class="album text-muted">
        <div class="container">

            <div class="row">

                @if(Session::has('flash_message'))
                <div class="alert alert-success">
                {{ Session::get('flash_message') }}
                </div>
                @endif

                <p><h1>All posts</h1></p>
                @foreach ($posts as $post)
                <p><h2>Id: {{ $post['id'] }}</h2></p>

                 {{--for many to many--}}
                    {{--Category:--}}
                    {{--@foreach ($post['category'] as $category)--}}
                    {{--<p>{{ $category['name'] }}</p>--}}
                    {{--@endforeach--}}

                <p>Category: {{ $post->category['name'] }}</p>
                <p>Title: <a href="{{ route('posts.show', ['post' => $post]) }}">{{ $post['title'] }}</a></p>
                <p>Text: {{ $post['text'] }}</p>
                <p>Author: {{ $post->user['name'] }}</p>
                @endforeach

            </div>

        </div>
    </div>

@endsection