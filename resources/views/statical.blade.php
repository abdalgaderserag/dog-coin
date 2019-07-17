@extends('layouts.app')

@section('title','Dashboard')

@section('content')
    <div class="container flex-box">

        @include('layouts.left-side')

        <div class="main" style="width: 60%;height: 260px;padding-top: 42px">
            <statical-view :data="{{ \App\Transfer::all() }}" :max="1800"></statical-view>
        </div>
    </div>
@endsection