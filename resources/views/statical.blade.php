@extends('layouts.app')

@section('title','Dashboard')

@section('content')
    <div style="padding: 100px 0;background-color: #f4f5ff;">
        <char :data="{{ \App\Transfer::all() }}"></char>
    </div>
    {{--<div class="container flex-box">--}}

        {{--@include('layouts.left-side')--}}
        {{--<div class="main" style="width: 60%;height: 260px;padding-top: 42px">--}}
            {{--            <statical-view :data="{{ \App\Transfer::all() }}" :max="1800"></statical-view>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection