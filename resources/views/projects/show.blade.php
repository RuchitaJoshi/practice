@extends('layouts.app')

@section('content')

    <h1>Project List</h1>
    @foreach($projects as $project)
    <li>{{$project->title}}</li>
    @endforeach
@endsection