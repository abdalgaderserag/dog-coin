<?php

namespace App\Observers;

use App\Transfer;
use App\User;

class TransferObserver
{
    /**
     * Handle the transfer "created" event.
     *
     * @param  \App\Transfer $transfer
     * @return void
     */
    public function created(Transfer $transfer)
    {
        $money = explode('.', $transfer->amount, 1);
        $sender = User::find($transfer->sender_id)->money;
        $recipient = User::find($transfer->recipient_id)->money;
        $sender->money -= $money[0];
        $sender->cents -= $money[1];
        $recipient->money += $money[0];
        $recipient->cents += $money[1];
        $recipient->save();
        $sender->save();
    }

    /**
     * Handle the transfer "updated" event.
     *
     * @param  \App\Transfer $transfer
     * @return void
     */
//    public function updated(Transfer $transfer)
//    {

//    }

    /**
     * Handle the transfer "deleted" event.
     *
     * @param  \App\Transfer $transfer
     * @return void
     */
//    public function deleted(Transfer $transfer)
//    {

//    }

    /**
     * Handle the transfer "restored" event.
     *
     * @param  \App\Transfer $transfer
     * @return void
     */
//    public function restored(Transfer $transfer)
//    {

//    }

    /**
     * Handle the transfer "force deleted" event.
     *
     * @param  \App\Transfer $transfer
     * @return void
     */
//    public function forceDeleted(Transfer $transfer)
//    {

//    }
}
