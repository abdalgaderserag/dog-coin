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
    protected $policies = [];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('users.update', 'App\Policies\UserPolicy@update');
        Gate::define('users.delete', 'App\Policies\UserPolicy@delete');

        Gate::define('transfers.view', 'App\Policies\TransferPolicy@view');
        Gate::define('transfers.create', 'App\Policies\TransferPolicy@create');
        Gate::define('transfers.update', 'App\Policies\TransferPolicy@update');
        Gate::define('transfers.delete', 'App\Policies\TransferPolicy@delete');

        Gate::define('requests.view', 'App\Policies\RequestPolicy@view');
        Gate::define('requests.update', 'App\Policies\RequestPolicy@update');
        Gate::define('requests.delete', 'App\Policies\RequestPolicy@delete');

        Gate::define('money', 'App\Policies\MoneyPolicy@money');

        Gate::define('favorite.view', 'App\Policies\FavoritePolicy@view');
        Gate::define('favorite.create', 'App\Policies\FavoritePolicy@create');
        Gate::define('favorite.delete', 'App\Policies\FavoritePolicy@delete');

        Passport::routes();
    }
}
