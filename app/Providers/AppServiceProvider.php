<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
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
       view()->composer('*',function($view){
         $category = Category::query()->get();
         $view->with(compact('category'));
        //  Paginator::useBootstrapFive(); // Bootstrap 5 Pagination styling.
       });
    }
}
