<?php

namespace Appzcoder\LaravelRoles;

use Illuminate\Support\ServiceProvider;

class LaravelRolesServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        $router->middleware('role', 'Appzcoder\LaravelRoles\Middleware\Role');

        $this->publishes([
            __DIR__ . '/migrations/' => database_path('/migrations'),
        ], 'migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

}
