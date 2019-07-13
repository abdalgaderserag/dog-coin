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
            <div style="padding: 14px 1% 14px 1%;margin-top: 80px;" class="flex-box card">

                <div style="padding: 8px 0 0 0;border-right: 1px solid #c4cdd17d;">
                    <img style="height: 80px;width: 80px;border-radius: 50%;padding-right: 8px"
                         src="{{ $user->avatar }}" alt="">
                </div>


                <div style="padding: 0 0 0 12px;width: 84.13%;">
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

                <img src="/images/menu.png" width="20px" height="20px" alt="">
            </div>
            {{--END :: Profile card end--}}




        </div>

    </div>
@endsection