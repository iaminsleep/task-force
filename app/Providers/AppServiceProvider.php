<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\City;

use App\Http\Services\RegisterUser;
use App\Http\Services\LoginUser;

use App\Http\Services\LogRegisterUser;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        if(config('users.log_register')) {
            $this->app->bind(RegisterUser::class, LogRegisterUser::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!app()->runningInConsole()) {
            Paginator::useBootstrap();

            $categories = cache()->remember('categories', 60*60*24, function() {
                return Category::all()->sortBy('id');
            });

            $cities = cache()->remember('cities', 60*60*24, function() {
                return City::all()->sortBy('id');
            });

            $timezone = $_COOKIE['timezone'] ?? config('timezone');

            View::share('categories', $categories);
            View::share('cities', $cities);
            View::share('timezone', $timezone);
        }
    }
}
