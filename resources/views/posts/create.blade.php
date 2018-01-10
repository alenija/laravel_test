@extends('layouts.app')

@section('title', 'Post Create')

@section('content')
    {!! Form::open([
        'route' => 'posts.store',
        'method' => 'post']) !!}
    <div>
        {!! Form::label('title', 'Category:') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
    </div>
    <div>
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title') !!}
    </div>
    <div>
        {!! Form::label('text', 'Text:') !!}
        {!! Form::textarea('text') !!}
    </div>
    {!! Form::submit('Send') !!}
    {!! Form::close() !!}

@endsection