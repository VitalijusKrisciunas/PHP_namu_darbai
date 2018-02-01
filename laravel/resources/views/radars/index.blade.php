@extends('layouts.layout')

@section('header_style')
<style>
    form {
        display:inline-block;
    }
    table{
        border:2px solid black;
        text-align:center;
    }
    table tr{
        border:1px solid black;
    }
    table td{
        border:1px solid black;
    }
</style>
@endsection

@section('content')
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
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{route('radars.index')}}">Radarai</a></li>
                        <li><a href="{{route('drivers.index')}}">Vairuotojai</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Kalbos pasirinkimas -->

                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    Language <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('language.switch', ['language' => 'en'])}}">England</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('language.switch', ['language' => 'lt'])}}">Lithuania</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
    <script src="{{ asset('js/app.js') }}"></script>
<br>
<a href="{{route('radars.create')}}">{{trans('radars.new_rec')}}</a><br><br>
<table>
    <tr style="font-weight:700">
        <td>{{trans('radars.date')}}</td>
        <td>{{trans('radars.number')}}</td>
        <td>{{trans('radars.speed', ['metrics'=>'Km/h'])}}</td>
        <td>{{trans('radars.drivers')}}</td>
        <td>{{trans('radars.user')}}</td>
        <td>{{trans('radars.action')}}</td>
    </tr>

    @foreach($radars as $radar)
    <tr>
        <td>{{ $radar->date }}</td>
        <td>{{ $radar->number }}</td>
        <td>{{ $radar->distance / $radar->time }}</td>
        <td>{{$radar->driver->name}}</td>
        <td>{{$radar->user->id}}</td>
        <td>
        <form action="{{ route('radars.edit', ['radar' => $radar->id]) }}">
                {{ csrf_field() }}
                <button type="submit">{{trans('radars.btn_upd')}}</button>
            </form>
            <form method="POST" action="{{ route('radars.destroy', ['radar' => $radar->id]) }}">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <button type="submit">{{trans('radars.btn_del')}}</button>
             </form>
        </td>
    </tr>        
    @endforeach
</table>

{{ $radars->links() }}

@endsection
