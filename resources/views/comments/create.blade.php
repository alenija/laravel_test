@extends('layouts.app')

@section('title', 'Comment create')

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
        'route' => 'comments.store',
        'method' => 'post']) !!}
    <div class="form-group">
        {!! Form::label('text', 'Text:') !!}
        {!! Form::textarea('text', null, ['class'=>'form-control', 'id'=>'text', 'rows'=>'15']) !!}
    </div>
    {!! Form::submit('Send',  ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection