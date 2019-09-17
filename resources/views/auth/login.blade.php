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
            <div style="width: max-content">Go Home</div>
        </a>
    </div>

    <div class="content flex-box">
        <div class="box-log flex-box">
            <div class="log-section">
                <div class="head">Login to CPay</div>

                <form action="{{ route('login') }}" id="login-form" method="POST">
                    @csrf
                    <div class="card log-card">
                        <div class="text-log">
                            <div>
                                <input type="email" id="email" name="email" placeholder="Enter email">
                            </div>
                            <div>
                                <input type="password" id="password" name="password" placeholder="Password">
                            </div>
                            <div id="error">

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
                            <button id="login-submit" type="submit" role="button">
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
<script src="/js/io.js"></script>
<script>

    localStorage.clear();
    var he = window.innerHeight;
    document.getElementById('app').style.minHeight = he + 'px';
    /*document.getElementById('login-form').onsubmit = function (e) {

        let data = {
            client_id: 2,
            client_secret: '{{ \Illuminate\Support\Facades\DB::table('oauth_clients')->find(2)->secret }}',
            grant_type: 'password',
            username: document.getElementById('email').value,
            password: document.getElementById('password').value,
        };
        document.getElementById('error').innerText = '';
        document.getElementById('login-submit').style.backgroundColor = '#e0e0e0';
        axios.post('/oauth/token', data)
            .then(response => {
                localStorage.setItem('access_token', response.data.access_token);
                localStorage.setItem('expires_in', response.data.expires_in);
                localStorage.setItem('refresh_token', response.data.refresh_token);
                localStorage.setItem('token_type', response.data.token_type);
                document.getElementById('login-form').submit();
            })
            .catch(error => {
                document.getElementById('login-submit').style.backgroundColor = '#0067ff';
                document.getElementById('error').innerText = 'the email or password didn\'t match any of our records check it again !'
            });
        e.preventDefault();
    }*/
</script>

</html>