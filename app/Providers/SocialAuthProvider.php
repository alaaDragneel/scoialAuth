<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SocialAuthProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Http\Interfaces\SocialAuthInterface',
            'App\Http\Eloquents\SocialAuthEloquent'
        );
    }
}
