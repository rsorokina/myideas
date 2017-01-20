<?php

/**
 * @author admin
 * @copyright 2017
 */

namespace Rsorokina\Nbblog;

use Illuminate\Support\ServiceProvider;

class NbblogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__ . '/routes.php';
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}