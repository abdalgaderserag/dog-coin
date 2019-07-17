@extends('layouts.app')

@section('title','Dashboard')

@section('content')
    <div class="container flex-box">

        @include('layouts.left-side')

        <div class="main" style="width: 60%;padding-top: 42px">

            <div class="card" style="margin-top: 43px;padding: 1%">
                <input type="search" name="user" placeholder="search for user" class="card-id"
                       style="background-color:#f4f5ff;margin-bottom: 18px;width: 95%;margin-left: 2.5%;">
            </div>


            <div style="margin-top: 32px" class="header">Requests:</div>
            <div>
                <div class="transfer">
                    <div class="transfer-item">

                        <div class="flex-box" style="flex-direction: column;float: left;padding-top:14px;">
                            <div style="text-align: center;height: 10px;margin-bottom: 18px">&bigwedge;</div>
                            {{--<div style="text-align: center;height: 14px;padding-top: 4px;">4</div>--}}
                            <div style="text-align: center;height: 10px;">&bigvee;</div>
                        </div>

                        <div class="transfer-image">
                            <img class="second-avatar" src="/images/profile/default.jpeg" style="position: unset;"
                                 alt="">
                        </div>
                        <div class="transfer-text flex-box" style="justify-content: space-between;padding-left: 1%">
                            <div>
                                <span>John</span>
                            </div>
                            <div>
                                some money for the Nginx project and the server.
                            </div>
                            <div>
                                <input type="submit" value="delete" class="card"
                                       style="border: 1px solid #e3e7f1;padding: 4px 22%;width: max-content;">
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="line">
            </div>

        </div>
    </div>
@endsection