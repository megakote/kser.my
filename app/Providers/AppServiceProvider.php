<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_TIME, 'ru_RU.utf8');
        Carbon::setLocale('ru');
        Schema::defaultStringLength(191);
        require_once(app_path()."/helpers.php");

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
