@extends('layouts.admin')

@section('content')

    <h1>Admin Users Create Page</h1>

{!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store','files'=>true]) !!}
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
        {{ Form::select('role_id', [''=>'choose role'] + $roles, null, ['class' => 'form-control']) }}
    </div>

    <!--  Form Input -->
    <div class="form-group">
        {{ Form::label('active', 'Status:', ['class' => 'control-label']) }}
        {{ Form::select('active', array(1=>'Active', 0=>'Not Active'), 0, ['class' => 'form-control']) }}
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
    {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
</div>
{!! Form::close() !!}

    @include('includes.form_error')

@stop