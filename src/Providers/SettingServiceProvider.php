<?php

namespace Fazlali\Setting\Providers;

use Illuminate\Support\ServiceProvider;


class SettingServiceProvider extends ServiceProvider
{

    public function boot()
    {
//        $this->publishes([
//            __DIR__ . '/../config/config.php' => config_path('jwt.php')
//        ], 'config');
        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations')
        ], 'migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('fazlali.setting.setting', function($app){
            return new \Fazlali\Setting\Setting($app['request']);
        });

    }

}
