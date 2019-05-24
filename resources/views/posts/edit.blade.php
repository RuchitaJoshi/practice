@extends('layouts.app')

@section('content')

    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['PostsController@update', $post->id]]) !!}
    <div class="form-group">
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
        {!! Form::label('body','Content:') !!}
        {!! Form::text('body', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update Post', ['class'=>'btn btn-info']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::model($post, ['method'=>'DELETE', 'action'=>['PostsController@destroy', $post->id]]) !!}
    <div class="form-group">
        {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}

@endsection
