@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Threads</div>

                    <div class="panel-body">
                        {{--@if (session('status'))--}}
                            {{--<div class="alert alert-success">--}}
                                {{--{{ session('status') }}--}}
                            {{--</div>--}}
                        {{--@endifp>--}}

                        {{--You are logged in! {{$user->name}}--}}

                        @foreach($threads as $thread)
                            <article>
                                {{--<a href="{{assert($thread->path())}}">--}}
                                <a href="/threads/{{$thread->channel->slug}}/{{$thread->id}}">
                                {{--<a href="{{assert('/threads/'. $thread->channel->slug .'/' . $thread->id)}}">--}}
                                    <h4>{{$thread->title}}</h4>
                                </a>
                                <div class="body">{{$thread->body}}</div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
