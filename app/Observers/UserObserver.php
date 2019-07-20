<?php

namespace App\Observers;

use App\Bio;
use App\Money;
use App\User;
use Faker\Factory;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @throws
     * @param  \App\User $user
     * @return void
     */
    public function created(User $user)
    {
        $bio = new Bio();
        $bio->user_id = $user->id;
        $bio->save();
        $money = new Money();
        $money->user_id = $user->id;
        $money->creditCardNumber = random_int(100000, 999999) . '' . random_int(100000, 999999) . '' . random_int(1000, 9999);
        $money->money = '' . random_int(1, 1000) * 1000 . '.20';
        $money->save();
        return;
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User $user
     * @return void
     *
     * public function updated(User $user)
     * {}*/

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User $user
     * @return void
     */
    public function deleted(User $user)
    {
        $user->money()->delete();
        $user->bio()->delete();
        $user->favorite()->delete();
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User $user
     * @return void
     *
     * public function restored(User $user)
     * {
     * //
     * }
     **
     * Handle the user "force deleted" event.
     *
     * @param  \App\User $user
     * @return void
     *
     * public function forceDeleted(User $user)
     * {
     * //
     * }*/

}
