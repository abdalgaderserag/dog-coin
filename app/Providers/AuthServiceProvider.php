<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
//        'App\Favorite' => 'App\Policies\FavoritePolicy',
//        'App\Money' => 'App\Policies\MoneyPolicy',
//        'App\RequestMoney' => 'App\Policies\RequestPolicy',
//        'App\Transfer' => 'App\Policies\TransferPolicy',
//        'App\User' => \App\Policies\UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::resource('users', 'App\Policies\UserPolicy')->only(['update', 'delete']);
        Gate::resource('transfers', 'App\Policies\TransferPolicy')->except(['restore', 'forceDelete']);
        Gate::resource('requests', 'App\Policies\RequestPolicy')->except(['restore', 'forceDelete']);
        Gate::resource('money', 'App\Policies\MoneyPolicy')->only('view');
        Gate::resource('favorites', 'App\Policies\FavoritePolicy')->except(['update', 'restore', 'forceDelete']);
        Passport::routes();
    }
}
