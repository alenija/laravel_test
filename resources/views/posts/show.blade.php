@extends('layouts.app')

@section('title', 'Page Post')

@section('content')
    <p><h1>{{ $post->title }}</h1></p>
    <p>Text: {{ $post->text }}</p>
    <p>Author: <i>{{ $post->user['name'] }}</i></p>
@endsection