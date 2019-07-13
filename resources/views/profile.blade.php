@extends('layouts.app')
@section('styles')
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container flex-box">

        {{--Left section of the page--}}
        <div class="left-section">
            <br>
            <div class="quick-card">
            </div>
        </div>


        {{--main section from the page--}}
        <div class="main">

            {{--START :: Profile card start--}}

            <div class="header" style="margin: 60px 0 16px 4%">{{ $user->name }}</div>


            <div class="flex-box card profile-card">

                <div class="profile-avatar">
                    <img style="height: 80px;width: 80px;border-radius: 50%;padding-right: 8px"
                         src="{{ $user->avatar }}" alt="">
                </div>


                <div class="text-card">
                    <div class="profile-text">
                        <span class="info-item-head">Name: </span>
                        {{ $user->name }}
                    </div>
                    <div class="profile-text">
                        <span class="info-item-head">Email: </span>
                        {{ $user->email }}
                    </div>
                    <div class="profile-text">
                        <span class="info-item-head">Card ID: </span>
                        {{ $user->money->creditCardNumber }}
                    </div>
                    <div class="profile-text">
                        <span class="info-item-head">Join at: </span>
                        {{ $user->created_at }}
                    </div>
                </div>

                <img src="/images/menu.png" alt="">
            </div>
            {{--END :: Profile card end--}}



            <div class="donate">
                <span style="margin-left: 25%">$</span>
                <input type="number" class="donate-input">
                <br>
                <input type="submit" class="donate-bottom" value="Send">
            </div>

            <div class="site-card">
                {{--width: 45.45%--}}
                <div class="flex-box sites">

                    <div class="card first-site" style="background: url('/images/shop.jpg') center center / cover;">
                    </div>
                    <div class="card" style="background: url('/images/dog-coin.png') center center / cover;">
                    </div>

                    <div class="card first-site" style="background: url('/images/ink.png') center center / cover;">
                    </div>
                </div>
            </div>


        </div>

    </div>
@endsection