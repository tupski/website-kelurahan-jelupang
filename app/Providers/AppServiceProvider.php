<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
    public function boot(): void
    {
        // Mendaftarkan komponen layout bootstrap
        Blade::component('layouts.bootstrap', 'bootstrap-layout');

        // Mendaftarkan komponen layout admin
        Blade::component('layouts.admin', 'admin-layout');

        // Mendaftarkan komponen layout admin bootstrap
        Blade::component('layouts.admin-bootstrap', 'admin-bootstrap-layout');

        // Menggunakan Bootstrap untuk pagination
        Paginator::useBootstrap();
    }
}
