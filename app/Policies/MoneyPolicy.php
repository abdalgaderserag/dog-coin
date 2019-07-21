<?php

namespace App\Policies;

use App\User;
use App\Money;
use Illuminate\Auth\Access\HandlesAuthorization;

class MoneyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the money.
     *
     * @param  \App\User $user
     * @param  \App\Money $money
     * @return mixed
     */
    public function view(User $user, Money $money)
    {
        return Auth::id() == $user->id && $user->id == $money->user_id;
    }

//    /**
//     * Determine whether the user can create money.
//     *
//     * @param  \App\User  $user
//     * @return mixed
//     */
//    public function create(User $user)
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can update the money.
//     *
//     * @param  \App\User  $user
//     * @param  \App\Money  $money
//     * @return mixed
//     */
//    public function update(User $user, Money $money)
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can delete the money.
//     *
//     * @param  \App\User  $user
//     * @param  \App\Money  $money
//     * @return mixed
//     */
//    public function delete(User $user, Money $money)
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can restore the money.
//     *
//     * @param  \App\User  $user
//     * @param  \App\Money  $money
//     * @return mixed
//     */
//    public function restore(User $user, Money $money)
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can permanently delete the money.
//     *
//     * @param  \App\User  $user
//     * @param  \App\Money  $money
//     * @return mixed
//     */
//    public function forceDelete(User $user, Money $money)
//    {
//        //
//    }
}
