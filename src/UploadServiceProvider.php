<?php

namespace Yaojinhui1993\Upload;

use Illuminate\Support\ServiceProvider;

class UploadServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole() === true) {
            $this->handlePublishes();
        }
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/upload.php', 'upload');

        $this->app->singleton(Filesystem::class, Filesystem::class);
        $this->app->singleton(UploadManager::class, function ($app) {
            return new UploadManager($app, $app['request'], $app->make(Filesystem::class));
        });
    }

    /**
     * handle publishes.
     */
    protected function handlePublishes()
    {
        $this->publishes([
            __DIR__.'/../config/upload.php' => config_path('upload.php'),
        ], 'config');
    }
}
