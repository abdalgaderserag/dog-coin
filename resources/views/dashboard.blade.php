@extends('layouts.app')

@section('title','Dashboard')

@section('styles')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container flex-box">
        @include('layouts.left-side')


        {{--main section from the page--}}
        <div class="main">
            <br>
            <div class="header">{{ __('dog.stats') }} :</div>
            <char :data="{{ \App\Transfer::all() }}"></char>
            <br>
            {{--<statical-view :data="{{ \App\Transfer::all() }}" :max="1800"></statical-view>--}}
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

@section('scripts')
    {{--<script src="{{ asset('stats/canvasjs.min.js') }}"></script>--}}
@endsection