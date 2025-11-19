<?php

namespace Denason\Neshan;

use Denason\Neshan\Contracts\DirectionInterface;
use Denason\Neshan\Contracts\GeocodingInterface;
use Denason\Neshan\Contracts\MapMatchingInterface;
use Denason\Neshan\Contracts\ReverseGeocodingInterface;
use Denason\Neshan\Contracts\SearchInterface;
use Denason\Neshan\Contracts\StaticMapInterface;
use Denason\Neshan\Services\DirectionService;
use Denason\Neshan\Services\GeocodingService;
use Denason\Neshan\Services\MapMatchingService;
use Denason\Neshan\Services\ReverseGeocodingService;
use Denason\Neshan\Services\SearchService;
use Denason\Neshan\Services\StaticMapService;
use Illuminate\Support\ServiceProvider;


class NeshanServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Merge default config
        $this->mergeConfigFrom(__DIR__ . '/Config/neshan.php', 'neshan');

        // Register StaticMapService
        $this->app->singleton(StaticMapInterface::class, fn() => new StaticMapService(config('neshan.map.api_key')));

        // Register SearchService
        $this->app->singleton(SearchInterface::class, fn() => new SearchService(config('neshan.service.api_key')));

        // Register ReverseGeocodingService
        $this->app->singleton(ReverseGeocodingInterface::class, fn() => new ReverseGeocodingService(config('neshan.service.api_key')));

        // Register GeocodingService
        $this->app->singleton(GeocodingInterface::class, fn() => new GeocodingService(config('neshan.service.api_key')));


        // Register DirectionService
        $this->app->singleton(DirectionInterface::class, fn() => new DirectionService(config('neshan.service.api_key')));

        // Register MapMatchingService
        $this->app->singleton(MapMatchingInterface::class, fn() => new MapMatchingService(config('neshan.service.api_key')));

        // Optionally register a manager if using multiple services centrally
        $this->app->singleton(NeshanManager::class, function ($app) {
            return new NeshanManager($app);
        });
    }

    public function boot(): void
    {
        // Publish a config file
        $this->publishes([
            __DIR__ . '/Config/neshan.php' => config_path('neshan.php'),
        ], 'config');

        // Load helpers
        if (file_exists(__DIR__ . '/Helpers/ResponseFormatter.php')) {
            require_once __DIR__ . '/Helpers/ResponseFormatter.php';
        }


       // $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
    }
}
