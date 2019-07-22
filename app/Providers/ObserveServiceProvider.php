<?php

namespace App\Providers;

use App\Observers\RequestMoneyObserver;
use App\Observers\TransferObserver;
use App\Observers\UserObserver;
use App\RequestMoney;
use App\Transfer;
use App\User;
use Illuminate\Support\ServiceProvider;

class ObserveServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Transfer::observe(TransferObserver::class);
        RequestMoney::observe(RequestMoneyObserver::class);
    }
}
