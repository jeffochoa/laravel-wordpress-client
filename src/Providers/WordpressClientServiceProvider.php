<?php

namespace WordpressClient\Providers;

use Zttp\ZttpResponse;
use WordpressClient\WordpressClient;
use Illuminate\Support\ServiceProvider;

class WordpressClientServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     */
    public function register()
    {
        ZttpResponse::macro('collection', function () {
            return collect($this->json());
        });
    }

    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/wordpress.php' => config_path('wordpress.php')
        ], 'laravel-wordpress');

        app()->bind(WordpressClient::class, function () {
            return new WordpressClient(config('wordpress.api_url'));
        });
    }
}
