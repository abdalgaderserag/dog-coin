<?php
$bio = $user->bio;
?>

@isset($bio->details)
    <div style="border-top: 1px solid #c4cdd17d;width: 100%;padding: 8px 0;margin-top: 8px">
        <span class="info-item-head">Bio:</span>
        <div style="padding-left: 1%">
            {{ $bio->details }}
        </div>
    </div>

    @if($bio->work or $bio->company or $bio->work_address or $bio->site)
        <div class="flex-box" style="border-top: 1px solid #c4cdd17d;width: 100%;">
            @isset($bio->work)
                <div style="width: 50%">
                    <span class="info-item-head">Job:</span>
                    <div style="padding-left: 2%">{{ $bio->work }}</div>
                </div>
            @endisset

            @isset($bio->work_address)
                <div style="width: 50%">
                    <span class="info-item-head">work address:</span>
                    <div style="padding-left: 2%">{{ $bio->work_address }}</div>
                </div>
            @endisset

            @isset($bio->company)
                <div style="width: 50%">
                    <span class="info-item-head">Company:</span>
                    <div style="padding-left: 2%">{{ $bio->company }}</div>
                </div>
            @endisset

            @isset($bio->site)
                <div style="width: 50%">
                    <span class="info-item-head">work website:</span>
                    <div style="padding-left: 2%">
                        <a class="link-clear" style="color: #0067ff" href="{{ 'https://' . $bio->site }}">
                            {{ $bio->site }}
                        </a>
                    </div>
                </div>
            @endisset
        </div>
    @endisset
@endisset