<?php

namespace Mamunmalik\CrudOperation;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;

class CrudOperationServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(
            CrudOperationCommand::class,
            // Artisan::call("migrate"),
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/publish/views/' => base_path('resources/views/'),
        ]);

        $this->publishes([
            __DIR__ . '/stubs/' => base_path('resources/crud-operation/'),
        ]);
    }
}
