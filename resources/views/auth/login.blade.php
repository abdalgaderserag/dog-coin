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
    <script src="{{ asset('stats/canvasjs.min.js') }}"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body>
<div id="app" style="background-color: #f4f5ff;height: -webkit-fill-available">
    <div class="content" style="padding: 92px 0 0 0">
        <div class="box-log flex-box" style="width: 60%">
            <div style="width: 80%;margin-left: 20%;">
                <div style="font-size: 3vh;margin: 0 0 8px 0">Login to Dog Coin</div>
                <div class="card" style="width:90%;margin-top: 28px;">
                    <div class="text-log" style="padding: 18px 2% 0 8%;width: 50%">
                        <div style="padding: 6px 0">
                            <input type="text" style="width: 100%;padding: 4px 1%;" placeholder="enter email">
                        </div>
                        <div style="padding: 6px 0 12px 0">
                            <input type="text" style="width: 100%;padding: 4px 1%;" placeholder="password">
                        </div>
                        <input type="checkbox" name="check" id="check">
                        <label for="check">Remember me.</label>
                        <span style="color: #4992ff;font-weight: 400;">Forget Password ?</span>
                    </div>
                    <hr class="line" style="border-bottom-width: 4px;">
                    <div style="padding: 6px 2% 10px 8%;font-size: 1.9vh;">
                        <div>Don't get an card yet? <span style="color: #4992ff;text-decoration: underline;margin-bottom: 4px;">Sign up</span></div>
                        <div>facing problems go to <span style="color: #4992ff;text-decoration: underline">support</span></div>
                    </div>
                    <div style="padding: 0 2% 10px 8%;">
                        <button type="submit" style="width:14%;background-color: #0067ff;border: 1px solid gray;padding: 6px 3%;color: white;border-radius: 14px;">
                            Login
                        </button>
                    </div>
                </div>

                <div class="flex-box">
                    <img width="80px" height="80px" src="/images/login/ink.png" alt="">
                    <img width="80px" height="80px" src="/images/login/ink.png" alt="">
                    <img width="80px" height="80px" src="/images/login/ink.png" alt="">
                </div>

                <div style="padding: 10px 6%;">

                </div>
            </div>
            {{--<img src="/images/login/desk-login.jpg" alt="">--}}
        </div>
    </div>
</div>
</body>

</html>