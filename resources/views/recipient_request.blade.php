@extends('layouts.app')

@section('title','Recipient Requests')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/request.css') }}">
@endsection

@section('content')
    <div class="container flex-box">

        @include('layouts.left-side')

        <div class="main">
            {{--<div class="header">show the recipient for user:</div>--}}
            <div class="card" style="margin-top: 43px;">
                <input type="search" name="user" placeholder="search for user" class="card-id"
                       style="background-color:#f4f5ff;margin-bottom: 18px;width: 95%;margin-left: 2.5%;">
            </div>
            <recipient-request></recipient-request>

        </div>

    </div>
    </div>


@endsection