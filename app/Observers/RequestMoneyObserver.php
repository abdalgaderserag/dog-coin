<?php

namespace App\Observers;

use App\RequestMoney;
use App\Transfer;

class RequestMoneyObserver
{
    /**
     * Handle the request money "created" event.
     *
     * @param  \App\RequestMoney $requestMoney
     * @return void
     */
    public function created(RequestMoney $requestMoney)
    {

    }

    /**
     * Handle the request money "updated" event.
     *
     * @param  \App\RequestMoney $requestMoney
     * @return void
     */
//    public function updated(RequestMoney $requestMoney)
//    {

//    }

    /**
     * Handle the request money "deleted" event.
     *
     * @param  \App\RequestMoney $requestMoney
     * @return void
     */
    public function deleted(RequestMoney $requestMoney)
    {
        if (isset($_GET['accept'])) {
            $transfer = new Transfer();
            $transfer->sender_id = $requestMoney->recipient_id;
            $transfer->recipient_id = $requestMoney->user_id;
            $transfer->amount = $requestMoney->money;
            $transfer->save();
        }
    }

    /**
     * Handle the request money "restored" event.
     *
     * @param  \App\RequestMoney $requestMoney
     * @return void
     */
//    public function restored(RequestMoney $requestMoney)
//    {

//    }

    /**
     * Handle the request money "force deleted" event.
     *
     * @param  \App\RequestMoney $requestMoney
     * @return void
     */
//    public function forceDeleted(RequestMoney $requestMoney)
//    {

//    }
}
