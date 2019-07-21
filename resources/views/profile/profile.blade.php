@extends('layouts.app')

<?php
$profile = \Illuminate\Support\Facades\Auth::id() == $user->id;
?>

@if($profile)
    @section('title','Profile')
@else
    @section('title',$user->name . ' | Profile')
@endif


@section('styles')
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container flex-box">

        @include('layouts.left-side')


        {{--main section from the page--}}
        <div class="main">

            {{--START :: Profile card start--}}

            <div class="header">{{ $user->name }}</div>


            <div class="flex-box card profile-card">

                <div class="profile-avatar">
                    <img style="height: 80px;width: 80px;border-radius: 50%;"
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

                <img src="/images/menu.png" class="menu" alt="">

                @include('profile.parts.bio')
            </div>
            {{--END :: Profile card end--}}

            @unless($profile)
                <div class="donate">
                    <span>$</span>
                    <input type="number" class="donate-input">
                    <br>
                    <input type="submit" class="donate-bottom" value="Send">
                </div>
            @endunless

            <div class="site-card">
                {{--width: 45.45%--}}
                <div class="flex-box sites">

                    <div class="card first-site" style="background: url('/images/shop.jpg') center center / cover;">
                    </div>
                    <div class="card" style="background: url('/images/dog-coin.png') center center / cover;">
                    </div>

                    <div class="card first-site" style="background: url('/images/ink.png') center center / cover;">
                    </div>
                    {{--@if($profile)--}}
                    {{--<span style="font-size: 11vh;margin-top: 10%;margin-left: 12%;">+</span>--}}
                    {{--@endif--}}
                </div>
            </div>
        </div>
        {{--main section from the page--}}


    </div>
@endsection