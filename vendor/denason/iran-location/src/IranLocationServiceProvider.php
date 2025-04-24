<?php

namespace Denason\IranLocation;
use Denason\IranLocation\Console\Commands\IranLocationInstallCommand;

use Illuminate\Support\ServiceProvider;

class IranLocationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

        $this->app->bind(IranLocationInterface::class, IranLocation::class);

        // Merge package config with application's config
        $this->mergeConfigFrom(
            __DIR__ . '/Config/iran-location.php',
            'iran-location'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {


        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');

        // Publish config file
        $this->publishes([
            __DIR__ . '/Config/iran-location.php' => config_path('iran-location.php'),
        ], 'iran-location-config');


         //Register commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                IranLocationInstallCommand::class
            ]);
        }


    }
}
