@extends('layouts.app')

@section('title','Dashboard')

@section('content')
    <div class="container flex-box">

        @include('layouts.left-side')

        <div class="main" style="width: 60%;padding-top: 42px">
            {{--<div class="header">show the recipient for user:</div>--}}
            <div class="card" style="margin-top: 43px;padding: 1%">
                <input type="search" name="user" placeholder="search for user" class="card-id"
                       style="background-color:#f4f5ff;margin-bottom: 18px;width: 95%;margin-left: 2.5%;">
            </div>

            {{--<div class="flex-box" style="justify-content: end;padding: 2%;">--}}

            {{--<div class="filter" style="width: 18%;padding: 0.5% 2% 0.5% 2%;">--}}
            {{--<select style="width: 100%;margin: 0;border-radius: 4px;border: unset;background-color: inherit;" name="date" class="card-id" id="">--}}
            {{--<option value="All">All</option>--}}
            {{--<option value="today">today</option>--}}
            {{--<option value="last week">last week</option>--}}
            {{--<option value="last month">last month</option>--}}
            {{--<option value="this year">this year</option>--}}
            {{--</select>--}}
            {{--</div>--}}
            {{--<div class="filter" style="width: 18%;padding: 0.5% 2% 0.5% 2%;">--}}
            {{--<select style="width: 100%;margin: 0;border-radius: 4px;border: unset;background-color: inherit;" name="date" class="card-id" id="">--}}
            {{--<option value="All">All</option>--}}
            {{--<option value="Bill">Bill</option>--}}
            {{--<option value="request">Request</option>--}}
            {{--</select>--}}
            {{--</div>--}}
            {{--<div class="filter" style="width: 18%;padding: 0.5% 2% 0.5% 2%">--}}
            {{--<span style="cursor: pointer;">amount</span>--}}
            {{--</div>--}}
            {{--</div>--}}

            <div style="margin-top: 32px" class="header">Requests:</div>
            <div>
                <div class="transfer">
                    <div class="transfer-item">
                        <div class="transfer-image">
                            <img class="second-avatar" src="/images/profile/default.jpeg" style="position: unset;"
                                 alt="">
                        </div>
                        <div class="transfer-text flex-box" style="justify-content: space-between;padding-left: 1%">
                            <div>
                                <span>John</span>
                                <span>$500</span>
                            </div>
                            <div>
                                some money for the Nginx project and the server.
                            </div>
                            <div class="flex-box" style="width: 20%">
                                <input type="submit" value="deny" class="card"
                                       style="border: 1px solid #e3e7f1;padding: 4px 4%;width: max-content;">
                                <input type="submit" value="accept" class="card"
                                       style="border: 1px solid #e3e7f1;padding: 4px 4%;width: 50%;background-color: #0067ff;color: white;margin-left: 15%">
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="line">
                <div class="transfer">
                    <div class="transfer-item">
                        <div class="transfer-image">
                            <img class="second-avatar" src="/images/profile/default.jpeg" style="position: unset;"
                                 alt="">
                        </div>
                        <div class="transfer-text flex-box" style="justify-content: space-between;padding-left: 1%">
                            <div>
                                <span>John</span>
                                <span>$500</span>
                            </div>
                            <div>
                                some money for the Nginx project and the server.
                            </div>
                            <div class="flex-box" style="width: 20%">
                                <input type="submit" value="deny" class="card"
                                       style="border: 1px solid #e3e7f1;padding: 4px 4%;width: max-content;">
                                <input type="submit" value="accept" class="card"
                                       style="border: 1px solid #e3e7f1;padding: 4px 4%;width: 50%;background-color: #0067ff;color: white;margin-left: 15%">
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="line">
                <div class="transfer">
                    <div class="transfer-item">
                        <div class="transfer-image">
                            <img class="second-avatar" src="/images/profile/default.jpeg" style="position: unset;"
                                 alt="">
                        </div>
                        <div class="transfer-text flex-box" style="justify-content: space-between;padding-left: 1%">
                            <div>
                                <span>John</span>
                                <span>$500</span>
                            </div>
                            <div>
                                some money for the Nginx project and the server.
                            </div>
                            <div class="flex-box" style="width: 20%">
                                <input type="submit" value="deny" class="card"
                                       style="border: 1px solid #e3e7f1;padding: 4px 4%;width: max-content;">
                                <input type="submit" value="accept" class="card"
                                       style="border: 1px solid #e3e7f1;padding: 4px 4%;width: 50%;background-color: #0067ff;color: white;margin-left: 15%">
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="line">
                <div class="transfer">
                    <div class="transfer-item">
                        <div class="transfer-image">
                            <img class="second-avatar" src="/images/profile/default.jpeg" style="position: unset;"
                                 alt="">
                        </div>
                        <div class="transfer-text flex-box" style="justify-content: space-between;padding-left: 1%">
                            <div>
                                <span>John</span>
                                <span>$500</span>
                            </div>
                            <div>
                                some money for the Nginx project and the server.
                            </div>
                            <div class="flex-box" style="width: 20%">
                                <input type="submit" value="deny" class="card"
                                       style="border: 1px solid #e3e7f1;padding: 4px 4%;width: max-content;">
                                <input type="submit" value="accept" class="card"
                                       style="border: 1px solid #e3e7f1;padding: 4px 4%;width: 50%;background-color: #0067ff;color: white;margin-left: 15%">
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="line">
                <div class="transfer">
                    <div class="transfer-item">
                        <div class="transfer-image">
                            <img class="second-avatar" src="/images/profile/default.jpeg" style="position: unset;"
                                 alt="">
                        </div>
                        <div class="transfer-text flex-box" style="justify-content: space-between;padding-left: 1%">
                            <div>
                                <span>John</span>
                                <span>$500</span>
                            </div>
                            <div>
                                some money for the Nginx project and the server.
                            </div>
                            <div class="flex-box" style="width: 20%">
                                <input type="submit" value="deny" class="card"
                                       style="border: 1px solid #e3e7f1;padding: 4px 4%;width: max-content;">
                                <input type="submit" value="accept" class="card"
                                       style="border: 1px solid #e3e7f1;padding: 4px 4%;width: 50%;background-color: #0067ff;color: white;margin-left: 15%">
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="line">
            </div>

        </div>
    </div>


@endsection