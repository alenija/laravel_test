@extends('layouts.app')

@section('title', 'Page Post')

@section('content')
    @if (auth()->check())
        @if (auth()->user()->isAdmin())

            {!! Form::model($post, [
                'method' => 'PATCH',
                'route' => ['posts.update', $post->id]
            ]) !!}

            <div class="form-group">
                {!! Form::label('title', 'Category:') !!}
                {!! Form::select('category_id', $categories, $post->category, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title') !!}
            </div>
            <div class="form-group">
                {!! Form::label('text', 'Text:') !!}
                {!! Form::textarea('text') !!}
            </div>
            {!! Form::submit('Send',  ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}


        @endif
     @endif
 @endsection