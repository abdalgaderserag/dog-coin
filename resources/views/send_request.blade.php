@extends('layouts.app')

@section('title','Dashboard')

@section('content')
    <div class="container flex-box">
        @include('layouts.left-side')

        <div class="main" style="width: 60%;padding-top: 42px">
            {{--<input type="text" class="card-id"--}}
            {{--style="width: 50%;padding: 4px 16px;margin-top: 60px;border: 1px solid #e3e7f1;font-size: 2.7vh;border-radius: 18px;">--}}
            <div class="header">Normal request:</div>
            <div class="card" style="padding: 1%;margin-bottom: 7%;">
                <div>
                    <div class="transfer-img">
                        {{--<img src="/images/profile/default.jpeg" style="width: 80px;border-radius: 50%" alt="">--}}

                        <input type="text" class="card-id" placeholder="enter card ID"
                               style="margin-left: 18%;background-color: #f4f5ff;">
                        <div style="text-align: center;">or</div>
                        <select name="gadora" class="card-id select-input"
                                style="margin: 4px 0 18px 18%;background-color: #f4f5ff;">
                            <option>
                                <img src="/images/profile/default.jpeg" width="30px" height="30px" alt="">
                                <span>mohamed</span>
                            </option>
                        </select>
                    </div>
                    {{--<div class="transfer-img" style="width: 80px;height: 80px">--}}
                    {{--<img src="/images/profile/default.jpeg" style="width: inherit;border-radius: 50%" alt="">--}}
                    {{--</div>--}}
                </div>
                {{--<div></div>--}}
            </div>

            <div style="margin-bottom: 7%;">
                <div class="header" style="margin-bottom: 32px;">Send to Gadora:</div>
                <img src="/images/profile/default.jpeg" style="width: 80px;height: 80px;border-radius: 50%;float: left;"
                     alt="">
                <div class="card" style="width: 88%;margin-left: 12%;">
                    <input type="number" placeholder="card ID" class="card-id" style="width: 83.3%;">
                    <textarea placeholder="explanation tell gadora why you send the request." id="" cols="30" rows="10" class="card-id" style="width: 83.3%;">

                    </textarea>
                    <input type="button" value="Send" class="card-id" style="width: 88%;background-color: aliceblue;margin-bottom: 18px;">
                </div>
            </div>

            <div class="header">All request:</div>
            <transfer></transfer>

        </div>
    </div>
@endsection