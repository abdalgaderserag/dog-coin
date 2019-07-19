<?php

namespace App\Observers;

use App\Transfer;
use Illuminate\Support\Facades\Auth;

class TransferObserver
{
    /**
     * Handle the transfer "created" event.
     *
     * @param  \App\Transfer  $transfer
     * @return void
     */
    public function created(Transfer $transfer)
    {
        //
        Auth::user()->money = Auth::user()->money - $transfer->amount;
        Auth::user()->save();
    }

    /**
     * Handle the transfer "updated" event.
     *
     * @param  \App\Transfer  $transfer
     * @return void
     */
//    public function updated(Transfer $transfer)
//    {

//    }

    /**
     * Handle the transfer "deleted" event.
     *
     * @param  \App\Transfer  $transfer
     * @return void
     */
//    public function deleted(Transfer $transfer)
//    {

//    }

    /**
     * Handle the transfer "restored" event.
     *
     * @param  \App\Transfer  $transfer
     * @return void
     */
//    public function restored(Transfer $transfer)
//    {

//    }

    /**
     * Handle the transfer "force deleted" event.
     *
     * @param  \App\Transfer  $transfer
     * @return void
     */
//    public function forceDeleted(Transfer $transfer)
//    {

//    }
}
