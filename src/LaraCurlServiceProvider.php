<?php

namespace Pradeep\LaraCurl;

use Illuminate\Support\ServiceProvider;

class LaraCurlServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('LaraCurlService', function ($app) {
            return new LaraCurlService();
        });

        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // 
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'test');
    }
}