<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;


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
        Paginator::useBootstrapFive();

        // Blade::directive('myname', function ($x) {
        //     return "chen myae kay khaing ===> " . $x;
        // });

        // Blade::if('abc', function () {
        //     return true;
        // });

        Blade::if('admin', function () {
            return Auth::user()->role === 'admin';
        });

        Blade::if('notAuthor', function () {
            return Auth::user()->role !== 'author';
        });
    }
}
