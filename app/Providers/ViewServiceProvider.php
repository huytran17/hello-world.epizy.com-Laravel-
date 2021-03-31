<?php

namespace App\Providers;

use App\Http\View\Composers\AdminDashboardComposer;
use App\Http\View\Composers\AdminSettingComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('admin.dashboard', AdminDashboardComposer::class);
        View::composer('admin.setting-panel', AdminSettingComposer::class);
    }
}
