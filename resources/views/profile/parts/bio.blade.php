<?php
$bio = $user->bio;
?>

@empty(!$bio->details)
    <div style="border: 0 solid #c4cdd17d;border-width: 1px 0;width: 100%;padding: 8px 0;margin-top: 8px">
        <span class="info-item-head">Bio:</span>
        <div style="padding-left: 1%">
            gadora please add some text for the details here so it viewd in profile view do it now
        </div>
    </div>


    <div class="flex-box" style="width: 100%;">

        <div style="width: 50%;">
            <span class="info-item-head">Job:</span>
            <div style="padding-left: 2%">{{ $bio->work }}</div>
            <span class="info-item-head">Company:</span>
            <div style="padding-left: 2%">{{ $bio->company }}</div>
        </div>
        <div style="width: 50%;">
            <span class="info-item-head">work address:</span>
            <div style="padding-left: 2%">{{ $bio->work_address }}</div>
            <span class="info-item-head">work website:</span>
            <div style="padding-left: 2%">
                <a class="link-clear" style="color: #0067ff" href="https:\\baka-team.io">
                    {{ $bio->site }}
                </a>
            </div>
        </div>
    </div>
@else
    <div class="flex-box" style="width: 100%;border-top: 1px solid #c4cdd17d;">

        <div style="width: 50%;float: left">
            <span class="info-item-head">Job:</span>
            <div style="padding-left: 2%">{{ $bio->work }}</div>
            <span class="info-item-head">Company:</span>
            <div style="padding-left: 2%">{{ $bio->company }}</div>
        </div>
        <div style="width: 50%;float: left">
            <span class="info-item-head">work address:</span>
            <div style="padding-left: 2%">{{ $bio->work_address }}</div>
            <span class="info-item-head">work website:</span>
            <div style="padding-left: 2%">
                <a class="link-clear" style="color: #0067ff" href="{{ 'https://' . $bio->site }}">
                    {{ $bio->site }}
                </a>
            </div>
        </div>
    </div>
@endif