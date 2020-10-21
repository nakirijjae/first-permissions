<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Product' => 'App\Policies\ProductPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
          return $user->isSuperAdmin() ? true : null;
        });

        Gate::define('edit-product', function ($user, $id) {
          return $user->isAdminUser()
                ? Response::allow()
                : Response::deny('You must be an administrator.');
        });

        Gate::define('view-product', function ($user, $id) {
          return $user->isAdminUser() || $user->isBasicUser()
                ? Response::allow()
                : Response::deny('You must be a registered user.');
        });

        Gate::define('delete-product', function ($user, $id) {
          return $user->isAdminUser()
                ? Response::allow()
                : Response::deny('You must be a super admin.');
        });

        Gate::define('edit-products', function ($user) {
          return ($user->isAdminUser());
        });

        Gate::define('create-product', function ($user) {
          return $user->isAdminUser()
                ? Response::allow()
                : Response::deny('You must be an administrator.');
        });

        Gate::define('update-product', function ($user, $id) {
          return $user->isAdminUser()
                ? Response::allow()
                : Response::deny('You must be an administrator.');
        });
    }
}
