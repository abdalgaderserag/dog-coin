@extends('layouts.app')

@section('title','favorite')

@section('content')
    <div class="container flex-box">

        @include('layouts.left-side')

        <div class="main" style="width: 60%;padding-top: 42px">

            <div class="card" style="margin-top: 43px;padding: 1%">
                <input type="search" name="user" placeholder="search for user" class="card-id"
                       style="background-color:#f4f5ff;margin-bottom: 18px;width: 95%;margin-left: 2.5%;">
            </div>


            <?php
            $favorite = \App\Favorite::all()->where('user_id', \Illuminate\Support\Facades\Auth::id());
            ?>
            <div id="fav-list">
                @forelse($favorite as $fav)
                    @if($loop->index == 0)
                        <div style="margin-top: 32px" class="header">Requests:</div>
                    @endif
                    <div class="flex-box favorite"
                         style="padding-bottom: 10px;border-bottom: 1px solid gray;margin-top: 10px">
                        <div style="margin-right: 2%">
                            <a href="{{ '/profile/' . $fav->recipient->slug }}">
                                <img src="{{ $fav->recipient->avatar }}" style="width: 80px;border-radius: 50%;" alt="">
                            </a>
                        </div>
                        <div class="flex-box" style="width: 80%;flex-direction: column">
                            <div>{{ $fav->recipient->name }}</div>
                            <div style="height: 34px;margin-top: 6px">
                                <button onclick="deleteUser({{ $fav->id }},{{ $loop->index }}, {{ $fav->recipient->id }})"
                                        style="border: 1px solid #e3e7f1;padding: 4px 4%;background-color: #0067ff;color: white;">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div style="padding: 5%">
                        <span style="font-size: 4vh">You currently don't added any person add some by searching int the input in the left.</span>
                        <br>
                        <span>the added users can be easly find when send recipient money.</span>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function deleteUser(id, index, user_id) {
            axios.delete('/api/favorite/' + id)
                .then((response) => {
                    let items = document.getElementsByClassName('favorite');
                    items[index].style.display = 'none';
                    deleteInArray(user_id);
                    if (index + 1 == items.length) {
                        let div = document.getElementById('fav-list');
                        div.innerHTML = '<div style="padding: 5%">' +
                            '<span style="font-size: 4vh">You currently don\'t added any person add some by searching int the input in the left.</span>' +
                            '<br>' +
                            '<span>the added users can be easly find when send recipient money.</span>' +
                            '</div>';
                    }
                });
        }

        function deleteInArray(id) {
            index = 0;
            for (let i = 0; i < app.$children[index].favorite.length; i++) {
                console.log(app.$children[index].favorite[i].listed_id + '\n' + id);
                if (app.$children[index].favorite[i].listed_id == id) {
                    console.log(app.$children[index]);
                    app.$children[index].favorite.splice(i, 1);
                }
            }
        }
    </script>
@endsection