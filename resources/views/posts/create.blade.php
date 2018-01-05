@extends('layouts.app')

@section('title', 'Post Create')

@section('sidebar')
    @parent

    <p>Sidebar_3</p>
@endsection

@section('content')
    <p>Form</p>
    {{--@foreach ($posts as $post)--}}
        {{--<p>Id: {{ $post->id }}</p>--}}
        {{--<p>Title: {{ $post->title }}</p>--}}
        {{--<p>Text: {{ $post->text }}</p>--}}
        {{--<p>Author: {{ $post->author_id }}</p>--}}
    {{--@endforeach--}}
@endsection