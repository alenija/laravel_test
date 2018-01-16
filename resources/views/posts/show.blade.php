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
    <div class="row">
        <div class="col-md-6">
            @if (auth()->check())
                @if (auth()->user()->isAdmin())
                    {{--<a href="{{ route('posts.edit', ['post' => $post]) }}">Edit </a>--}}
                    <a href="{{ route('posts.edit', ['post' => $post]) }}" class="btn btn-primary">Edit</a>
                    {{--<a href="{{ route('posts.destroy', ['post' => $post]) }}">Remove</a>--}}
                    <div class="col-md-6 text-right">
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['posts.destroy', $post]
                        ]) !!}
                        {!! Form::submit('Delete this post?', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                @endif
            @endif
        </div>
    </div>
    <p><h1>Comments:</h1></p>
    @foreach ($post['comments'] as $comment)
        <p><h2>Id: {{ $comment['id'] }}</h2></p>
        <p>Text: {{ $comment['text'] }}</p>
        <p>Author: {{ $comment->user['name'] }}</p>
{{--        <p>Data: {{ $comment['created_at'] }}</p>--}}
        <p>Data: {{ Carbon\Carbon::parse($comment['created_at'])->format('d-m-Y h:i') }}</p>
    @endforeach
 @endsection