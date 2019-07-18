@extends('layouts.app')


@section('title','Edit Profile')



@section('styles')
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container flex-box">

        @include('layouts.left-side')


        <?php
        $user = \Illuminate\Support\Facades\Auth::user();
        ?>
        {{--main section from the page--}}
        <div class="main">

            {{--START :: Profile card start--}}

            <div class="header">{{ $user->name }}</div>

            <form action="{{ route('user.update') }}" method="post">
                @csrf
                @method('put')

                <div class="flex-box card profile-card">

                    <div class="profile-avatar" style="max-width: unset">
                        <img style="height: 80px;width: 80px;border-radius: 50%;"
                             src="{{ $user->avatar }}" alt="">
                        {{--<input type="file" name="avatar">--}}
                    </div>


                    <div class="text-card" style="width: 50%">
                        <div class="profile-text" style="max-width: unset">
                            <span class="info-item-head">Name: </span>
                            <br>
                            <input type="text" name="name" value="{{ $user->name }}" id=""
                                   style="width: 88%;padding: 4px 1%;font-size: 2vh">

                        </div>
                        <div class="profile-text" style="max-width: unset">
                            <span class="info-item-head">Email: </span>
                            <br>
                            <input type="text" name="email" value="{{ $user->email }}" id=""
                                   style="width: 88%;padding: 4px 1%;font-size: 2vh">
                        </div>
                        <div class="profile-text" style="margin-top: 6px">
                            <span class="info-item-head">Card ID: </span>
                            {{ $user->money->creditCardNumber }}
                        </div>
                        <div class="profile-text" style="margin-top: 6px">
                            <button>Save Edit</button>
                        </div>
                    </div>

                    <div style="width: 35%;height: inherit;">
                        <textarea placeholder="add some informations about you so others can find you."
                                  name="details" style="width: 100%;height: inherit;font-size: 2vh;padding: 2%" id="" cols="30"
                                  rows="10"></textarea>
                    </div>

                </div>
            </form>
            {{--END :: Profile card end--}}
            <br>

            <div class="card" style="padding: 8px 2%;width: 98%">
                <div style="width: 70%;float: left;">Switch Account type require some fee !!</div>
                <button style="width: 13%">Work Account</button>
                <span style="margin-left: 3%">$500 fee</span>
            </div>

            <br>

            <div class="header">Fills</div>
            <div style="width: 48%;height: 20px;float: left;padding: 4px 1%;">
                <div class="info-item-head">Job:</div>
                <input type="text" name="" style="width: 96%;padding: 4px 2%;font-size: 2vh" id="">
                <div class="info-item-head">work address:</div>
            </div>
            <div style="width: 48%;height: 20px;float: left;padding: 4px 1%;">
                <div class="info-item-head">Company:</div>
                <div class="info-item-head">Work website:</div>
            </div>
            <button style="margin-top: 98px">Save</button>

            <br>
            <br>

        </div>
        {{--main section from the page--}}

    </div>
@endsection