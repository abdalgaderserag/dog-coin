@extends('layouts.app')
@section('styles')
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container flex-box">

        {{--Left section of the page--}}
        <div class="left-section">
            <br>
            <div class="quick-card">
            </div>
        </div>


        {{--main section from the page--}}
        <div class="main">
            <br>
            <div style="margin-bottom: 12px">{{ \Illuminate\Support\Facades\Auth::user()->name }}</div>
            <div class="card" style="padding: 0 1%">
                <img src="{{ \Illuminate\Support\Facades\Auth::user()->avatar }}" width="150px" style="border-radius: 50%" alt="">
            </div>
        </div>

    </div>
@endsection