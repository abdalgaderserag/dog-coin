{{--Left section of the page--}}
<div class="left-section">
    <?php
    $user = \Illuminate\Support\Facades\Auth::user();
    ?>
    <br>
    <div class="quick-card">
        <send></send>

        <hr style="border-width: 0 0 2px 0;">

        <div style="padding: 16px 0 0 0;">

            <div style="margin-bottom: 12px">
                <img src="images/Icons/request.svg" style="width: 1.7%;position: absolute;" alt="">
                <a href="/request/send" class="link-clear">
                            <span style="padding-left: 13%">
                            Send request
                        </span>
                </a>
            </div>
            <div style="margin-bottom: 12px">
                <img src="images/Icons/store.png" style="width: 1.7%;position: absolute;" alt="">
                <a href="/request/recipient" class="link-clear">
                            <span style="padding-left: 13%">
                            Recipient rquest
                        </span>
                </a>
            </div>
            <div style="margin-bottom: 12px">
                <img src="images/Icons/static.svg" style="width: 1.7%;position: absolute;" alt="">
                <a href="/statical" class="link-clear">
                            <span style="padding-left: 13%">
                            Statical
                        </span>
                </a>
            </div>
            <div style="margin-bottom: 12px">
                <img src="images/Icons/profile.svg" style="width: 1.7%;position: absolute;" alt="">
                <a href="/" class="link-clear">
                            <span style="padding-left: 13%">
                            Edit profile
                        </span>
                </a>
            </div>
            <div style="margin-bottom: 12px">
                <img src="images/Icons/favorite.svg" style="width: 1.7%;position: absolute;" alt="">
                <a href="/favorite" class="link-clear">
                            <span style="padding-left: 13%">
                            Favorite
                        </span>
                </a>
            </div>

        </div>
    </div>
</div>