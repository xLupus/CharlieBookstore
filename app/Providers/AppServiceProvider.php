<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        URL::forceScheme('https');
    }

    /**
     * Bootstrap any application services.
     *14
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
    }
}
