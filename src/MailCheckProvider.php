<?php

namespace IlhanAydinli\LaravelMailCheck;

use IlhanAydinli\LaravelMailCheck\Commands\AllCheckCommand;
use IlhanAydinli\LaravelMailCheck\Commands\ConfigCheckCommand;
use Illuminate\Support\ServiceProvider;
use IlhanAydinli\LaravelMailCheck\MailCheck;
use IlhanAydinli\LaravelMailCheck\Commands\MailCheckCommand;
use IlhanAydinli\LaravelMailCheck\Commands\SpfCheckCommand;

class MailCheckProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register the service the package provides.
        $this->app->singleton('mail-check', function ($app) {
            return new MailCheck;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'mail-check');
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/mail-check'),
            ], 'views');
            $this->commands([
                AllCheckCommand::class,
                ConfigCheckCommand::class,
                SpfCheckCommand::class,
                MailCheckCommand::class,
            ]);
        }
    }
}
