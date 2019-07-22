<?php

namespace App\Policies;

use App\User;
use App\Transfer;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class TransferPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the transfer.
     *
     * @param  \App\User $user
     * @param  \App\Transfer $transfer
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->id == Auth::id();
    }

    /**
     * Determine whether the user can create transfers.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->id == Auth::id();
    }

    /**
     * Determine whether the user can update the transfer.
     *
     * @param  \App\User $user
     * @param  \App\Transfer $transfer
     * @return mixed
     */
    public function update(User $user, Transfer $transfer)
    {
        return $user->id == $transfer->user_id || $user->id == $transfer->recipient_id;
    }

    /**
     * Determine whether the user can delete the transfer.
     *
     * @param  \App\User $user
     * @param  \App\Transfer $transfer
     * @return mixed
     */
    public function delete(User $user, Transfer $transfer)
    {
        return $user->id == $transfer->user_id;
    }

//    /**
//     * Determine whether the user can restore the transfer.
//     *
//     * @param  \App\User $user
//     * @param  \App\Transfer $transfer
//     * @return mixed
//     */
//    public function restore(User $user, Transfer $transfer)
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can permanently delete the transfer.
//     *
//     * @param  \App\User $user
//     * @param  \App\Transfer $transfer
//     * @return mixed
//     */
//    public function forceDelete(User $user, Transfer $transfer)
//    {
//        //
//    }
}
