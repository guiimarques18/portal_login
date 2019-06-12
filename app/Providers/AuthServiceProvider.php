<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Auth;

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

        //
        Auth::provider('customcs', function ($app, array $config) {
            // exit("oi");
            // return new CustomEloquentUserProvider($app->make('App\User'));
            return $app->make(CustomEloquentUserProvider::class, [$app['hash'], $config['model']]);
        });
    }
}
