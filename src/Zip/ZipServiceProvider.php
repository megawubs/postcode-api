<?php
/**
 * Created by PhpStorm.
 * User: bwubs
 * Date: 20-04-15
 * Time: 10:14
 */

namespace Wubs\Zip;

use Illuminate\Support\ServiceProvider;

class ZipServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([__DIR__ . '/config/zip.php' => config_path('zip.php')]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;
        $app->singleton(
            '\Wubs\Zip\ZipApi',
            function ($app) {
                return new ZipApi($app['config']->get('zip.key'));
            }
        );

        $app->bind(
            'zip',
            function () use ($app) {
                return $app->make('\Wubs\Zip\ZipApi');
            }
        );
    }

    public function provides()
    {
        return ['Wubs\Zip\ZipApi'];
    }
}