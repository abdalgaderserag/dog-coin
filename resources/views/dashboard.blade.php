@extends('layouts.app')

@section('title','Dashboard')

@section('styles')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/transfer.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container flex-box">
        @include('layouts.left-side')


        <div class="main">
            <br>
            <div class="header">News:</div>
            <div class="card flex-box" style="height: 240px">
                <div style="float:left;font-size: 3.8vh;height:inherit;width: 48%;overflow: hidden;">
                    <div style="padding: 2%;">
                        lorem sadaksd jlasjda sklj klasfjlk aj
                    dhkdg fjkahfj hld kfhadlh jhadsjlkfhl dskh fjlkadshfl jkadshfj
                    hldsfh jadshfjkh alfhlkshdf ljkadshf kajfdlsdjf lahfsa;DJ K;
                    </div>
                </div>
                <img src="/images/dashboard/ink-news.jpg"
                     style="width: 52%;height: 240px;object-fit: cover;border-top-right-radius: 4px;border-bottom-right-radius: 4px;"
                     alt="">
            </div>
            <br>
            <div class="header">{{ __('dog.creditCard') }} :</div>
            <div class="credit-card-info">
                <span class="info-item-head">{{ __('dog.cardId') }} :</span>
                <span>21412-21412-34523-35211</span>
                <br>
                <span class="info-item-head">{{ __('dog.money') }} :</span>
                <span>$499000</span>
                <br>
                <span class="info-item-head">{{ __('dog.cDate') }} :</span>
                <span>2019 / 07 / 11</span>
                <br>
                <span class="info-item-head">{{ __('dog.subType') }} :</span>
                <span>Personal</span>
            </div>
            <br>
            <div class="header">{{ __('dog.transfers')  }} :</div>
            <transfer></transfer>
        </div>

    </div>
@endsection