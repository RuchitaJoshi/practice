<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-confirm-delete.css') }}" rel="stylesheet">
    <link href="{{asset('css/ajax-pagination.css')}}" rel="stylesheet">
</head>
{{--<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">--}}
{{--<link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/cyborg/bootstrap.min.css" rel="stylesheet" type="text/css">--}}
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Browse<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/threads">All Threads</a></li>
                                @if(auth()->check())
                                    <li><a href="/threads?by={{auth()->user()->name}}">My Thread</a></li>
                                    @endif
                            </ul>
                        </li>
                        <li><a href="{{asset('/threads/create')}}">New Thread</a></li>
                    </ul>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ url('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    {{--script for search box in posts/index file--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    {{--pagination--}}
    <script src="{{asset('js/ajax-pagination/ajax-pagination-2.1.4-jquery.min.js')}}"></script>
    <script src="{{asset('js/ajax-pagination/ajax-pagination-bootstrap.min.js')}}"></script>
    <script src="{{asset('js/ajax-pagination/ajax-pagination.js')}}"></script>


    <script src="{{asset('js/app.js') }}"></script>
    <script src="{{asset('js/custom.js') }}"></script>
    <script src="{{asset('js/test.js')}}"></script>
    <script src="{{asset('js/bootstrap-confirm-delete.js')}}"></script>

    {{--<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>--}}
    {{--<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
    {{--<script src="{{asset('js/bootstable.js')}}"></script>--}}
    {{--<script>--}}
        {{--$('table').SetEditable();--}}
    {{--</script>--}}
</html>