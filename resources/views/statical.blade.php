@extends('layouts.app')

@section('title','Static')

@section('content')
    <div style="padding: 100px 0;background-color: #f4f5ff;">
        <char :data="{{ \App\Transfer::all() }}"></char>
    </div>
@endsection