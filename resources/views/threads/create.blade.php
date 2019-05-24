@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a New Thread</div>

                    <div class="panel-body">

                        <form method="POST" action="/threads">
                            {{csrf_field()}}

                            <div class="group-control">
                                <label for="channel_id">Select Channel</label>
                                <select name="channel_id" id="channel_id" class="form-control" required>
                                    <option value="">Choose One...</option>
                                    @foreach($channels as $channel)
                                        <option value="{{$channel->id}}" {{old('channel_id') == $channel->id ? 'selected' : ''}} >{{$channel->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="group-control">
                                <label for="title">Title:</label>
                                <input type="text" name="title" placeholder="Enter Title" class="form-control" value="{{old('title')}}" required>
                            </div>

                            <div class="group-control">
                                <label for="body">Body</label>
                                <textarea name="body" id="body" cols="30" rows="10" class="form-control" required>{{old('body')}}</textarea>
                            </div>

                            <div class="form-group">
                            <button name="submit" class="btn btn-default">Publish</button>
                            </div>

                            @if(count($errors))
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
