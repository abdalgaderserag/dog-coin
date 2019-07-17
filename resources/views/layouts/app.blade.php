<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @section('title')
            Dog Coin
        @show
    </title>

    <!-- Scripts -->


    <!-- Fonts -->
{{--<link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">--}}

<!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/left.css') }}" rel="stylesheet">
    <link href="{{ asset('css/request.css') }}" rel="stylesheet">
    <link href="{{ asset('css/transfer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
<div id="app">
    <div class="nav-bar">
        <div class="nav-bar-group flex-box" style="flex-wrap: nowrap">
            {{--<img src="images/dog.svg" alt="">--}}
            <div class="nav-bar-item">
                <span><a href="/dashboard" class="link-clear">{{ __('dog.dashboard') }}</a></span>
            </div>
            <div class="nav-bar-item transfer-nav" onclick="viewMenu()">
                <span>{{ __('dog.transfer') }} ⌵</span>
            </div>
            <div class="nav-bar-item">
                {{--<span>$500</span>--}}
                <span>${{ \Illuminate\Support\Facades\Auth::user()->money->money }}</span>
            </div>
        </div>
        <div class="nav-bar-group flex-box" style="padding: 4px 4px 4px 8px;">
            <a href="/profile">
                <img class="avatar" src="{{ \Illuminate\Support\Facades\Auth::user()->avatar }}" alt="">
            </a>
        </div>
    </div>
    <div class="nav-menu card">
        <img src="/images/cross.svg" width="24px" style="float: left;padding: 4px 1%;position: absolute;" alt=""
             onclick="document.getElementsByClassName('nav-menu')[0].style.display = 'none';">
        <div style="padding: 4px 10%;font-size: 2.7vh;">
            <a href="/request/send" class="link-clear">Send request</a>
        </div>
        <div style="padding: 4px 10%;font-size: 2.7vh;">
            <a href="/request/recipient" class="link-clear">Recipient request</a>
        </div>
        <div style="padding: 4px 10%;font-size: 2.7vh;">
            <a href="/statical" class="link-clear">Statical</a>
        </div>
        <div style="padding: 4px 10%;font-size: 2.7vh;">
            <a href="/" class="link-clear">Edit profile</a>
        </div>
        <div style="padding: 4px 10%;font-size: 2.7vh;">
            <a href="/favorite" class="link-clear">Favorite</a>
        </div>
    </div>
    @yield('content')
    @include('layouts.footer')
</div>

<!-- Scripts -->
<script src="{{ asset('js/response.js') }}"></script>

<script src="{{ asset('js/app.js') }}"></script>
<script>
    window.axios.defaults.headers.common["Authorization"] = "Bearer {{ $access }}";
</script>
<script src="{{ asset('js/vueComponent.js') }}"></script>
<script>

    document.getElementsByClassName('nav-menu')[0].style.display = 'none';

    function viewMenu() {

        if (document.getElementsByClassName('nav-menu')[0].style.display == 'none') {
            document.getElementsByClassName('nav-menu')[0].style.display = 'block';
        } else {
            document.getElementsByClassName('nav-menu')[0].style.display = 'none';
        }

    }

    let app = new Vue({
        el: '#app',
        data: {
            user: {!! \Illuminate\Support\Facades\Auth::user() !!},
        }
    });
</script>
@yield('scripts')

</body>
</html>
