@extends('layouts.app')

@section('title','Dashboard')

@section('styles')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container flex-box">
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
                        <span style="padding-left: 13%">
                            Send request
                        </span>
                    </div>
                    <div style="margin-bottom: 12px">
                        <img src="images/Icons/store.png" style="width: 1.7%;position: absolute;" alt="">
                        <span style="padding-left: 13%">
                            Recipient rquest
                        </span>
                    </div>
                    <div style="margin-bottom: 12px">
                        <img src="images/Icons/static.svg" style="width: 1.7%;position: absolute;" alt="">
                        <span style="padding-left: 13%">
                            Statical
                        </span>
                    </div>
                    <div style="margin-bottom: 12px">
                        <img src="images/Icons/profile.svg" style="width: 1.7%;position: absolute;" alt="">
                        <span style="padding-left: 13%">
                            Edit profile
                        </span>
                    </div>
                    <div style="margin-bottom: 12px">
                        <img src="images/Icons/favorite.svg" style="width: 1.7%;position: absolute;" alt="">
                        <span style="padding-left: 13%">
                            Favorite
                        </span>
                    </div>

                </div>
            </div>
        </div>


        {{--main section from the page--}}
        <div class="main">
            <br>
            <div class="header">{{ __('dog.stats') }} :</div>
            <statical-view :data="{{ \App\Transfer::all() }}" :max="1800"></statical-view>
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
                {{--<span>Business</span>--}}
                <button class="input-button" style="float: right;">{{ __('dog.editCard') }}</button>
            </div>
            <br>
            <div class="header">{{ __('dog.transfers')  }} :</div>
            <transfer></transfer>
        </div>

    </div>
@endsection
