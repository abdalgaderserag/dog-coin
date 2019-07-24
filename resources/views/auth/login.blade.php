<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        Login
    </title>

    <!-- Scripts -->


    <!-- Styles -->
    <link href="{{ asset('css/auth/login.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body>
<div id="app">

    <div class="nav-bar flex-box card" style="height: 52px;width:100%;background-color:white;position: fixed;">
        <a class="link-clear" href="/" style="margin-left: 12%;padding: 14px 1% 0 1%">
            <div>
                Home
            </div>
        </a>
    </div>

    <div class="content flex-box">
        <div class="box-log flex-box">
            <div class="log-section">
                <div class="head">Login to Dog Coin</div>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card log-card">
                        <div class="text-log">
                            <div>
                                <input type="text" name="email" placeholder="Enter email">
                            </div>
                            <div>
                                <input type="password" name="password" placeholder="Password">
                            </div>
                            <br>
                            <input type="checkbox" name="check" id="check">
                            <label for="check">Remember me.</label>
                            <span><a href="/forget" class="link-clear">Forget Password ?</a></span>
                        </div>

                        <hr class="line">

                        <div class="log-footer">
                            <div>Don't get an card yet?
                                <span class="span-link">
                                <a href="{{ route('register') }}" class="link-clear">Sign up</a>
                            </span>
                            </div>
                            <div>facing problems go to
                                <span class="span-link">
                                <a href="/support" class="link-clear">support</a>
                            </span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" role="button">
                                Login
                            </button>
                        </div>
                    </div>
                </form>


                <div class="login-using">
                    <div class="flex-box">
                        <a href="/ink">
                            <img class="card" src="/images/login/ink.png" alt="">
                        </a>
                        <a href="/atom">
                            <img class="card" src="/images/login/atom.png" alt="">
                        </a>
                        <a href="/code">
                            <img class="card" src="/images/login/codeclimate.png" alt="">
                        </a>
                    </div>
                </div>


            </div>
        </div>
        <img src="/images/login/site.png" class="log-image" alt="">
    </div>
</div>
</body>
<script>
    var he = window.innerHeight;
    document.getElementById('app').style.minHeight = he + 'px';
</script>

</html>