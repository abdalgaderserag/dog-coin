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

            <div class="header" style="margin-left: 15%;width: 70%;">{{ $user->name }}</div>

            <div class="card" id="report"
                 style="padding: 2px 1% 6px 1%;width: max-content;position: absolute;display: none;">
                <div onclick="addToList()" class="report-id" style="cursor: pointer;">add to list</div>
                <hr class="line" style="margin: 7px 0 0 0;">
                <div class="report-id" style="cursor: pointer;"><a href="/report" class="link-clear">report</a></div>
            </div>

            <div class="flex-box card profile-card" style="width: 80%;margin-left: 10%;">

                <div class="profile-avatar">
                    <img style="height: 80px;width: 80px;border-radius: 50%;"
                         src="{{ $user->avatar }}" alt="">
                </div>


                <div class="text-card">
                    <div class="profile-text">
                        {{--<span class="info-item-head">Name: </span>--}}
                        <span class="info-item-head">{{ $user->name }}</span>
                    </div>
                    <div class="profile-text">
                        {{--<span class="info-item-head">Email: </span>--}}
                        {{ $user->email }}
                    </div>
                    <div class="profile-text">
                        <span class="info-item-head">ID: </span>
                        {{ $user->money->creditCardNumber }}
                    </div>
                    <div class="profile-text">
                        {{--<span class="info-item-head">Join at: </span>--}}
                        {{ $user->created_at }}
                    </div>
                </div>
                @if(!$profile)
                    <img style="margin-left: -1.1%;" src="/images/menu.png" class="menu" alt="">
                @endif
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
            {{--@else--}}
                {{--<div class="flex-box" style="justify-content: center;margin-top: 6%;">--}}
                    {{--<span style="font-size: 3vh;">{{ '$' . $user->money->money }}</span>--}}
                {{--</div>--}}
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
                </div>
            </div>
        </div>
        {{--main section from the page--}}


    </div>
@endsection
@if(!$profile)
@section('scripts')
    <script>
        //Basic setup
        document.getElementById('report').style.display = 'none';

        //Elements
        let menu = document.getElementsByClassName('menu')[0];


        //Event Listener Section
        document.addEventListener('click', function (e) {
            if (e.target.className == 'menu')
                return;

            if (e.target.id != 'report' || e.target.className != 'report-id')
                document.getElementById('report').style.display = 'none';
        });

        menu.addEventListener('click', function (e) {
            let element = e.target;
            let left = e.layerX - 4 * (element.offsetWidth + 2);
            let top = e.layerY;
            element = document.getElementById('report');
            element.style.display = 'block';
            element.style.left = left + 'px';
            element.style.top = top + 'px';
        });

        //Functions
        function addToList() {
            axios.post('/api/favorite', {
                listed_id: {!! $user->id !!},
            })
        }
    </script>
@endsection
@endif