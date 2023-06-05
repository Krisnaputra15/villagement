<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Log;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // if (env('APP_ENV') !== 'local') {
        //     $this->app['request']->server->set('HTTPS', true);
        // } else {
        //     $this->app['request']->server->set('HTTP', true);
        // }

        // Schema::defaultStringLength(191);
    }
}
