@extends('layouts.app')

@section('title','Dashboard')

@section('content')
    <div class="container flex-box">

        @include('layouts.left-side')

        <div class="main">
            {{--<div class="header">show the recipient for user:</div>--}}
            <div class="card" style="margin-top: 43px;">
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

            <recipient-request></recipient-request>

            </div>

        </div>
    </div>


@endsection