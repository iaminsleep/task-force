<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\City;

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
        if(!app()->runningInConsole()) {
            Paginator::useBootstrap();

            $categories = Category::all()->sortBy('id');
            $optional_filters = [
                [
                    'name' => 'Без откликов',
                    'alias' => 'no_responses'
                ],
                [
                    'name' => 'Удалённая работа',
                    'alias' => 'remote_job',
                ],
            ];
            $time_filters = [
                [
                    'name' => 'За день',
                    'alias' => 'in_a_day'
                ],
                [
                    'name' => 'За неделю',
                    'alias' => 'in_a_week',
                ],
                [
                    'name' => 'За месяц',
                    'alias' => 'in_a_month',
                ],
            ];

            $cities = City::all()->sortBy('id');

            View::share('categories', $categories);
            View::share('cities', $cities);
            View::share('optional_filters', $optional_filters);
            View::share('time_filters', $time_filters);
        }
    }
}
