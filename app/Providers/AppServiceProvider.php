<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Log\Logger;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
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

        DB::listen(function ($query) {
            logger($query->sql);
        });

        // View::share('categories', Category::latest('id')->get());
        view()->composer([
            //ဒီမှာက blade တွေ ရေးပါတယ်
            'index',
            'detail',
            'post.edit',
            'post.create',
        ], function ($view) {
            $view->with("categories", Category::latest('id')->get());
        });

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
