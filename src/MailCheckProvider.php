<?php

namespace IlhanAydinli\LaravelMailCheck;

use Illuminate\Support\ServiceProvider;
use IlhanAydinli\LaravelMailCheck\MailCheck;
use IlhanAydinli\LaravelMailCheck\Commands\MailCheckCommand;

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
            $this->commands([
                MailCheckCommand::class,
            ]);
        }
    }
}
