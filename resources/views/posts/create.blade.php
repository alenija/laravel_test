@extends('layouts.app')

@section('title', 'Post Create')

@section('content')

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    {!! Form::open([
        'route' => 'posts.store',
        'method' => 'post']) !!}
    <div class="form-group">
        {!! Form::label('title', 'Category:') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('text', 'Text:') !!}
        {!! Form::textarea('text', null, ['class'=>'form-control', 'id'=>'text', 'rows'=>'15']) !!}
    </div>
    {!! Form::submit('Send',  ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection