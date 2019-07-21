<?php

namespace App\Policies;

use App\User;
use App\RequestMoney;
use Illuminate\Auth\Access\HandlesAuthorization;

class RequestPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the request money.
     *
     * @param  \App\User  $user
     * @param  \App\RequestMoney  $requestMoney
     * @return mixed
     */
    public function view(User $user, RequestMoney $requestMoney)
    {
        //
    }

    /**
     * Determine whether the user can create request money.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the request money.
     *
     * @param  \App\User  $user
     * @param  \App\RequestMoney  $requestMoney
     * @return mixed
     */
    public function update(User $user, RequestMoney $requestMoney)
    {
        //
    }

    /**
     * Determine whether the user can delete the request money.
     *
     * @param  \App\User  $user
     * @param  \App\RequestMoney  $requestMoney
     * @return mixed
     */
    public function delete(User $user, RequestMoney $requestMoney)
    {
        //
    }

    /**
     * Determine whether the user can restore the request money.
     *
     * @param  \App\User  $user
     * @param  \App\RequestMoney  $requestMoney
     * @return mixed
     */
    public function restore(User $user, RequestMoney $requestMoney)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the request money.
     *
     * @param  \App\User  $user
     * @param  \App\RequestMoney  $requestMoney
     * @return mixed
     */
    public function forceDelete(User $user, RequestMoney $requestMoney)
    {
        //
    }
}
