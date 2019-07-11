@extends('layouts.app')

@section('content')
    <div class="container flex-box">
        {{--Left section of the page--}}
        <div class="left-section">
            <br>
            <div class="quick-card card">

            </div>
        </div>


        {{--main section from the page--}}
        <div class="main">
            <br>
            <div class="header">Acc :</div>
            <div class="money-view card">

            </div>
            <div class="header">Credit Card :</div>
            <div class="credit-card-info">
                <span class="info-item-head">Card ID :</span>
                <span>21412-21412-34523-35211</span>
                <br>
                <span class="info-item-head">Money :</span>
                <span>$499000</span>
                <br>
                <span class="info-item-head">Card Date :</span>
                <span>2019 / 07 / 11</span>
                <br>
                <span class="info-item-head">Subscription Type :</span>
                <span>Personal</span>
                {{--<span>Business</span>--}}
                <button class="input-button" style="float: right;">Edit Card</button>
            </div>
            <br>
            <div class="header">Transfers :</div>
            <div class="transfer">
                <div class="transfer-item">
                    <div class="transfer-image">
                        <img src="/images/profile/default.jpeg" alt="">
                        <img src="/images/profile/default.jpeg" alt="">
                    </div>
                    <div class="transfer-text flex-box">
                        <span>gadora</span>
                        <span>&bkarow;</span>
                        <span>mousab</span>
                        <span>$500</span>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
