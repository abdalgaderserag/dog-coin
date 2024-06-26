<?php

namespace App\Policies;

use App\User;
use App\Favorite;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class FavoritePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the favorite.
     *
     * @param  \App\User $user
     * @param  \App\Favorite $favorite
     * @return mixed
     */
    public function view(User $user)
    {
        return Auth::id() == $user->id;
    }

    /**
     * Determine whether the user can create favorites.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Auth::id() == $user->id;
    }


    /**
     * Determine whether the user can delete the favorite.
     *
     * @param  \App\User $user
     * @param  \App\Favorite $favorite
     * @return mixed
     */
    public function delete(User $user, Favorite $favorite)
    {
        return Auth::id() == $user->id && $user->id == $favorite->user_id;
    }

}
