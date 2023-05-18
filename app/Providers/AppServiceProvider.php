<?php

namespace App\Providers;
use Laravel\Passport\Passport;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
{
   Passport::ignoreRoutes();
   $this->app->singleton('onesignal', function ($app) {
    return new OneSignalManager($app['config']['services.onesignal']);
});

$this->app->alias('onesignal', OneSignalManager::class);
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
