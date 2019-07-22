<?php

namespace App\Policies;

use App\User;
use App\Money;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

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

}
