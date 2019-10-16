<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //these gates sre for the access_levels
        Gate:: define('isAdmin', function($user){
          return $user->access_level === 'admin';
        });

        Gate:: define('isStandard', function($user){
          return $user->access_level === 'standard';
        });

        Gate:: define('superuser', function($user){
          return $user->access_level === 'superuser';
        });

        //
        Passport::routes();
    }
}
