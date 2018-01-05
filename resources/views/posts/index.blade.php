@extends('layouts.app')

@section('title', 'Page Posts')

@section('sidebar')
    @parent

    <p>Sidebar_2</p>
@endsection

@section('content')
    <p>Body</p>
    @foreach ($posts as $post)
        <p>Id: {{ $post->id }}</p>
        <p>Title: {{ $post->title }}</p>
        <p>Text: {{ $post->text }}</p>
        <p>Author: {{ $post->user_id }}</p>
    @endforeach

    {{--{{var_dump($authors)}}--}}
    {{--{{var_dump($authors_2)}}--}}
    {{--<p>Author_2: {{ $authors_2 }}</p>--}}

    <p><h2><i>Body 2 By user #1</i></h2></p>
    @foreach ($posts_2 as $post)
        <p>Id: {{ $post->id }}</p>
        <p>Title: {{ $post->title }}</p>
        <p>Text: {{ $post->text }}</p>
        <p>Author: {{ $post->user_id }}</p>
    @endforeach

    <p><h2><i>Body 3 Post by user </i></h2></p>
    @foreach ($posts_3 as $post)
        <p>Id: {{ $post->id }}</p>
        <p>Title: {{ $post->title }}</p>
        <p>Text: {{ $post->text }}</p>
        <p>Author: {{ $post->user->name }}</p>
        {{--{{var_dump($post)}}--}}
    @endforeach

@endsection