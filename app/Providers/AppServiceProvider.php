<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Laravel\Dusk\DuskServiceProvider;
use App\Channel;
use App\Theme;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $channels = Channel::all();
        \View::share('channels', $channels);
        $themes = Theme::all();
        \View::share('themes', $themes);
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

