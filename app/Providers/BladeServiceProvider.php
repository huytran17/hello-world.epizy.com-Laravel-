<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        

        Blade::if('isSuperAdmin', function () {
            $condition = false;

            if (auth()->check()) {
                $condition = auth()->user()->isSuperAdmin();
            }
            return $condition;
        });
    }
}
