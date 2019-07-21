@extends('layouts.app')

@section('title','Send Requests')

@section('content')
    <div class="container flex-box">
        @include('layouts.left-side')

        <div class="main">
            <send-request></send-request>
        </div>
    </div>
@endsection