<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    {{--<link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">--}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="nav-bar">
        <div class="nav-bar-group flex-box" style="flex-wrap: nowrap">
            {{--<img src="images/dog.svg" alt="">--}}
            <div class="nav-bar-item">
                <span>Dashboard</span>
            </div>
            <div class="nav-bar-item">
                <span>Transfer ⌵</span>
            </div>
            <div class="nav-bar-item">
                {{--<span>$500</span>--}}
                <span>${{ \Illuminate\Support\Facades\Auth::user()->money->money }}</span>
            </div>
        </div>
        <div class="nav-bar-group flex-box" style="padding: 4px 4px 4px 8px;">
            <img class="avatar" src="{{ \Illuminate\Support\Facades\Auth::user()->avatar }}" alt="">
        </div>
    </div>
    @yield('content')
</div>
<script src="{{ asset('js/response.js') }}"></script>
</body>
</html>
