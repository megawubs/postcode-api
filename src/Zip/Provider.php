<?php
/**
 * Created by PhpStorm.
 * User: bwubs
 * Date: 20-04-15
 * Time: 10:14
 */

namespace Wubs\Zip;

use Illuminate\Support\ServiceProvider;

class Provider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([__DIR__ . '/config/zip.php' => config_path('courier.php')]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            'Wubs\Zip\ZipApi',
            function ($app) {
                return new ZipApi($app['config']['zip_api']);
            }
        );
    }

    public function provides()
    {
        return ['Wubs\Zip\ZipApi'];
    }
}