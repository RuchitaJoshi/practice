@extends('layouts.admin')

@section('content')

    <h1>Admin Users Create Page</h1>

    <div class="row">

    <div class="col-sm-3">
            <img src="{{asset('images/'. $user->photo->path)}}" alt="http://placehold.it/400x400" class="img-responsive img-rounded">
    </div>

    <div class="col-sm-9">
    {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id],'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>

    <!--  Form Input -->
    <div class="form-group">
        {{ Form::label('email', 'Email:', ['class' => 'control-label']) }}
        {{ Form::text('email', null, ['class' => 'form-control']) }}
    </div>

    <!--  Form Input -->
    <div class="form-group">
        {{ Form::label('role_id', 'Role:', ['class' => 'control-label']) }}
        {{ Form::select('role_id', $roles, null, ['class' => 'form-control']) }}
    </div>

    <!--  Form Input -->
    <div class="form-group">
        {{ Form::label('active', 'Status:', ['class' => 'control-label']) }}
        {{ Form::select('active', array(1=>'Active', 0=>'Not Active'), null , ['class' => 'form-control']) }}
    </div>

    <!--  Form Input -->
    <div class="form-group">
        {{ Form::label('photo_id', 'Photo:', ['class' => 'control-label']) }}
        {{ Form::file('photo_id', null, ['class' => 'form-control']) }}
    </div>

    <!--  Form Input -->
    <div class="form-group">
        {{ Form::label('password', 'Password:', ['class' => 'control-label']) }}
        {{ Form::password('password', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    </div>

    </div>

    <div class="row">
        @include('includes.form_error')
    </div>

@stop