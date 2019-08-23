<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        Register
    </title>

    <!-- Scripts -->


    <!-- Styles -->
    <link href="{{ asset('css/auth/register.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body>
<div id="app">
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="nav-bar flex-box card" style="height: 52px;width:100%;background-color:white;position: fixed;">
            <a class="link-clear" href="/" style="margin-left: 12%;padding: 14px 1% 0 1%">
                <div>
                    Home
                </div>
            </a>
        </div>
{{--        @if($errors)--}}
            {{ $errors }}
        {{--@endif--}}
        <div class="content flex-box">
            <div class="box-log flex-box">
                <div class="log-section">
                    <div class="head">Register to Dog Coin</div>


                    <div class="card log-card">
                        <div class="text-log">
                            <div>
                                <input type="text" name="name" placeholder="Name">
                            </div>
                            <div>
                                <input type="email" name="email" placeholder="Enter email">
                            </div>
                            <div>
                                <input type="password" name="password" placeholder="Password">
                            </div>
                            <div>
                                <input type="password" name="password_confirmation" placeholder="Re-enter Password">
                            </div>
                        </div>

                        <hr class="line">

                        <div class="log-footer">
                            <div>Already have account ?
                                <span class="span-link">
                                <a href="{{ route('login') }}" class="link-clear">Sign in</a>
                            </span>
                            </div>
                            <div>facing problems go to
                                <span class="span-link">
                                <a href="/support" class="link-clear">support</a>
                            </span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit">
                                Register
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>
</body>
<script>
    var he = window.innerHeight;
    document.getElementById('app').style.minHeight = he + 'px';
</script>

</html>