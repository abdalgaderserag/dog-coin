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
            <?php
                $favorite = \App\Favorite::all()->where('user_id', \Illuminate\Support\Facades\Auth::id());
            ?>
            @foreach($favorite as $fav)
                <div>
                    <div class="favorite">
                        <div class="transfer">
                            <div class="transfer-item">

                                <div class="flex-box" style="flex-direction: column;float: left;padding-top:14px;">
                                    <div style="text-align: center;height: 10px;margin-bottom: 18px">&bigwedge;</div>
                                    {{--<div style="text-align: center;height: 14px;padding-top: 4px;">4</div>--}}
                                    <div style="text-align: center;height: 10px;">&bigvee;</div>
                                </div>

                                <div class="transfer-image">
                                    <img class="second-avatar" src="{{ $fav->recipient->avatar }}"
                                         style="position: unset;"
                                         alt="">
                                </div>
                                <div class="transfer-text flex-box" style="justify-content: start;padding-left: 1%">
                                    <div>
                                        <span>{{ $fav->recipient->name }}</span>
                                    </div>
                                    {{--<div style="margin-left: 2%">--}}
                                        {{--{{ $fav->details }}--}}
                                    {{--</div>--}}
                                    <div style="margin-left: 33%;float: right;width: 11%;">
                                        <input type="submit" onclick="deleteUser({{ $fav->id }},{{ $loop->index }})" value="delete"
                                               class="card"
                                               style="border: 1px solid #e3e7f1;padding: 4px 22%;width: max-content;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="line">
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function deleteUser(id,index) {
            axios.delete('/api/favorite/' + id)
                .then((response) => {
                    document.getElementsByClassName('favorite')[index].style.display = 'none';
                });
        }
    </script>
@endsection