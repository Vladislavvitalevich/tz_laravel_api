<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CitySearchRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CitySearchRepository::class, function ($app) {
            return new CitySearchRepository();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
