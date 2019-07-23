@extends('layouts.app')

@section('title','favorite')

@section('styles')
    <link href="{{ asset('css/favorite.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container flex-box">

        @include('layouts.left-side')

        <div class="main" >

            <div class="card search-card" style="margin-left: 1%;">
                <input type="search" name="user" placeholder="search for user" class="card-id">
            </div>


            <?php
            $favorite = \App\Favorite::all()->where('user_id', \Illuminate\Support\Facades\Auth::id());
            ?>
            <div id="fav-list">
                @forelse($favorite as $fav)
                    @if($loop->index == 0)
                        <div class="header">Requests:</div>
                    @endif
                    <div class="flex-box favorite">
                        <div class="card-avatar">
                            <a href="{{ '/profile/' . $fav->recipient->slug }}">
                                <img src="{{ $fav->recipient->avatar }}">
                            </a>
                        </div>
                        <div class="flex-box card-text">
                            <div>{{ $fav->recipient->name }}</div>
                            <div>
                                <button onclick="deleteUser({{ $fav->id }},{{ $loop->index }}, {{ $fav->recipient->id }})">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div id="fav-empty">
                        <span>You currently don't added any person add some by searching int the input in the left.</span>
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
                    items[index].innerHTML = '';
                    items[index].outerHTML = '';
                    deleteInArray(user_id);
                    if (0 == items.length) {
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
                if (app.$children[index].favorite[i].listed_id == id) {
                    app.$children[index].favorite.splice(i, 1);
                }
            }
        }
    </script>
@endsection