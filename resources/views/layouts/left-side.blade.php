{{--Left section of the page--}}

<link href="{{ asset('css/left.css') }}" rel="stylesheet">


<div class="left-section">
    <br>
    <div class="quick-card">
        <send></send>
        <hr>
        <div class="quick-links">
            <div>
                <a href="/request/send" class="link-clear">

                    <img src="/images/Icons/request.svg" style="width: 1.7%;position: absolute;" alt="">
                    <span>
                        Send request
                    </span>
                </a>
            </div>
            <div>
                <a href="/request/recipient" class="link-clear">
                    <img src="/images/Icons/store.png" alt="">
                    <span>
                        Recipient request
                    </span>
                </a>
            </div>
            <div>
                <a href="/statical" class="link-clear">
                    <img src="/images/Icons/static.svg" alt="">
                    <span>
                        Statical
                    </span>
                </a>
            </div>
            <div>
                <a href="/edit/profile" class="link-clear">
                    <img src="/images/Icons/profile.svg" alt="">
                    <span>
                        Edit profile
                    </span>
                </a>
            </div>
            <div>
                <a href="/favorite" class="link-clear">
                    <img src="/images/Icons/favorite.svg" alt="">
                    <span>
                        Favorite
                    </span>
                </a>
            </div>
            <form action="{{ route('logout') }}" method="post" id="logout">@csrf</form>
            <div>
                    <span onclick="event.preventDefault();document.getElementById('logout').submit();" style="cursor: pointer;">
                        Log-Out
                    </span>
            </div>
        </div>
    </div>
</div>