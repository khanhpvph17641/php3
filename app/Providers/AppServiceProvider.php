<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     * // 9-l-c-p
     * // x-ogin-us-or
     * 
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
