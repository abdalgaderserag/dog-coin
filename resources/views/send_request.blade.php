@extends('layouts.app')

@section('title','Dashboard')

@section('content')
    <div class="container flex-box">
        @include('layouts.left-side')

        <div class="main" style="width: 60%;padding-top: 42px">
            {{--<input type="text" class="card-id"--}}
                   {{--style="width: 50%;padding: 4px 16px;margin-top: 60px;border: 1px solid #e3e7f1;font-size: 2.7vh;border-radius: 18px;">--}}
            <div class="card">
                <div>
                    <div class="transfer-img" style="width: 80px;height: 80px"></div>
                    <div class="transfer-img" style="width: 80px;height: 80px"></div >
                </div>
                <div></div>
            </div>
        </div>
    </div>
@endsection