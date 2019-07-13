@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container flex-box">
        {{--Left section of the page--}}
        <div class="left-section">
            <br>
            <div class="quick-card">

                <span class="header">Search:</span>
                <br>

                <input type="text" class="card-id"><br><br><br>
                {{--<span style="padding:0 0 0 12px">Find &ctdot;</span>--}}


                <?php
                    $user = \Illuminate\Support\Facades\Auth::user();
                ?>

                {{--START :: Profile card start--}}

                <div class="flex-box profile-card">

                    <div class="profile-avatar" style="width: 100%">
                        <img style="height: 80px;width: 80px;border-radius: 50%;margin-left: 18%;"
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
                </div>
                {{--END :: Profile card end--}}

                <span>$ </span><input type="number" class="card-id">
                <input type="submit" class="send-money" style="width: 34%;margin-left: 24%;" value="Send">
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
