@extends('layouts.admin')
@section('content')
    <h1>Admin User Page</h1>



    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Photo</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
        @foreach($users as $user)
            @foreach($user->role_users()->get() as $role)
        <tr>
            <td>{{$user->id}}</td>
            <td><a href="{{asset('admin/users/' . $user->id . '/edit')}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$role->name ? $role->name : 'User has no role'}}</td>
            <td>{{$role->pivot->active == 0? 'Not Active':'Active'}}</td>
            @if($user->photo)
            <td><img height="50" src="{{asset('images/'.$user->photo->path)}}" alt="No image"></td>
            @else
                <td>No image</td>
            @endif
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
        </tr>
            @endforeach
        @endforeach
        @endif
        </tbody>
    </table>
@stop