<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

if(!isset($_SESSION)) session_start();

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
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
        Gate::define('permisos_admin', function($user){
            return $user->esAdmin == 1;
        });

        Gate::define('inicioSesion', function($user){
            return $user !== null;
        });

        Gate::define('noInicioSesion', function($user){
            return $user === null;
            
        });
    }
}
