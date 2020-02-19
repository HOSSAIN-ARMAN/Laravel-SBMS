<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;


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
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength('191');

        View::composer('admin.category.manage-category', function($view){
            return $view->categories = Category::all();
        });



    }
}
