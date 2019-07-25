<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CPay</title>

    <!-- Scripts -->
    <script src="{{ asset('stats/canvasjs.min.js') }}"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    @yield('styles')
    <style>
    </style>
</head>
<body>
<div id="app">
    <div class="container" style="padding: 0">

        {{--Start:: floating text start--}}
        <div class="header-text">
            <div class="flex-box">
                <div></div>
                <div class="flex-box">
                    <div class="nav-link">
                        <a href="/login" class="link-clear">Login</a>
                        <a href="/register" class="link-clear">Register</a>
                        <a href="/support" class="link-clear">Support</a>
                        <a href="/about" class="link-clear">About</a>
                    </div>
                </div>
            </div>

            <div class="flex-box big-text">
                <div style="text-align: center;">
                    <div class="h1">CPay</div>
                    <div class="h-text">The best and easy way to mange <br> your money transfers</div>
                    <div class="head-button">
                        <span>&ofcir;</span>
                        <span>&cir;</span>
                        <span>&cir;</span>
                        <span>&cir;</span>
                    </div>
                    {{--<button class="head-button">--}}
                    {{--+ Personal--}}
                    {{--</button>--}}
                    {{--<button class="head-button">--}}
                    {{--+ Bussins--}}
                    {{--</button>--}}
                </div>
            </div>
        </div>
        {{--End:: floating text start--}}


        {{--Start:: background section ( the back)--}}
        <div class="space"></div>
        {{--End:: background section ( the back)--}}


        <div class="text">
            <div>Send money to friend family or your barber</div>
            <br>
            <span>it's free flexibly way to access transfer mange money it help the <br> free communication channel.</span>
            <br>
            <a href="https://youtube.com">
                <button>See how it work!</button>
            </a>
        </div>


        {{--Start:: Login section--}}
        <div class="login">

            {{----}}
            <div class="box-log">
                <div class="log-section">
                    <div class="head">Login to CPay</div>

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
            {{----}}

        </div>
        {{--End:: Login section--}}

        @include('layouts.footer')
    </div>
</div>
</body>
<script>
    document.getElementsByClassName('space')[0].style.height = window.innerHeight + 'px';
    let head = document.getElementsByClassName('header-text')[0];
    let text = document.getElementsByClassName('big-text')[0];
    head.style.height = window.innerHeight + 'px';
    text.style.top = ((window.innerHeight - (text.offsetHeight * 1.5)) / 2) + 'px';
    text.children[0].children[1].style.marginTop = '82px';
</script>
</html>
