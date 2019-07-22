<?php

namespace App\Providers;

use App\Observers\RequestMoneyObserver;
use App\Observers\TransferObserver;
use App\Observers\UserObserver;
use App\RequestMoney;
use App\Transfer;
use App\User;
use Illuminate\Support\facades\schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        schema::defaultStringLength(191);
        User::observe(UserObserver::class);
//        Transfer::observe(TransferObserver::class);
        RequestMoney::observe(RequestMoneyObserver::class);
    }
}
