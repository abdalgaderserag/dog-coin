@extends('layouts.app')


@section('title','Edit Profile')



@section('styles')
    {{--<link href="{{ asset('css/profile.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/edit-profile.css') }}" rel="stylesheet">
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
                @method('PUT')

                <div class="flex-box card profile-card">

                    <div class="profile-avatar">
                        <img src="{{ $user->avatar }}" style="margin-top: 2%" alt="">
                        {{--<input type="file" name="avatar">--}}
                        <div style="text-align: center;font-size: 1.8vh">Change<br>Avatar</div>
                    </div>


                    <div class="text-card">
                        <div class="profile-text">
                            <span class="info-item-head">Name: </span>
                            <br>
                            <input type="text" name="name" value="{{ $user->name }}">

                        </div>
                        <div class="profile-text">
                            <span class="info-item-head">Email: </span>
                            <br>
                            <input type="text" name="email" value="{{ $user->email }}">
                        </div>
                        <div class="profile-text">
                            <span class="info-item-head">Card ID: </span>
                            {{ $user->money->creditCardNumber }}
                        </div>
                        <div class="profile-text">
                            {{--<button>Save Edit</button>--}}
                        </div>
                    </div>

                    <div class="details-card">
                        <textarea placeholder="add some informations about you so others can find you."
                                  name="details"
                                  cols="30"
                                  rows="10">{{ $user->bio->details }}</textarea>
                    </div>

                </div>
                {{--END :: Profile card end--}}
                <br>

                <br>

                <div class="header">Fills</div>
                <div class="info-input">
                    <div class="info-item-head">Job:</div>
                    <input class="info-item-input" value="{{ $user->bio->work }}" type="text" name="work" id="">
                    <div class="info-item-head">work address:</div>
                    <input class="info-item-input" type="text" name="work_address"
                           value="{{ $user->bio->work_address }}" id="">

                </div>
                <div class="info-input">
                    <div class="info-item-head">Company:</div>
                    <input class="info-item-input" type="text" name="company" value="{{ $user->bio->company }}" id="">

                    <div class="info-item-head">Work website:</div>
                    <input class="info-item-input" type="text" name="site" value="{{ $user->bio->site }}" id="">
                </div>
                <button class="info-input-bottom">Save</button>

                <br>
                <br>
            </form>
        </div>
        {{--main section from the page--}}

    </div>
@endsection