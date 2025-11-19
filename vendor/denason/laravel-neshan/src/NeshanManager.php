<?php

namespace Denason\Neshan;

use Denason\Neshan\Contracts\DirectionInterface;
use Denason\Neshan\Contracts\GeocodingInterface;
use Denason\Neshan\Contracts\MapMatchingInterface;
use Denason\Neshan\Contracts\MapMatchingServiceInterface;
use Denason\Neshan\Contracts\NeshanManagerInterface;
use Denason\Neshan\Contracts\ReverseGeocodingInterface;
use Denason\Neshan\Contracts\SearchInterface;
use Denason\Neshan\Contracts\StaticMapInterface;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Application;


/**
 * Class NeshanManager
 *
 * Central manager for accessing different Neshan map services through the Laravel service container.
 * This class acts as a facade-friendly gateway to retrieve service instances like StaticMap.
 *
 * Example usage:
 * ```
 * $mapService = app(NeshanManager::class)->staticMap();
 * $url = $mapService->generate(...);
 * ```
 *
 * @package Denason\Neshan
 */
class NeshanManager implements NeshanManagerInterface
{
    /**
     * The Laravel application instance.
     *
     * @var Application
     */
    protected Application $app;

    /**
     * Create a new NeshanManager instance.
     *
     * @param Application $app The Laravel application container
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * {@inheritdoc}
     * @throws BindingResolutionException
     */
    public function staticMap(): StaticMapInterface
    {
        return $this->app->make(StaticMapInterface::class);
    }

    /**
     * {@inheritdoc}
     * @throws BindingResolutionException
     */
    public function search(): SearchInterface
    {
        return $this->app->make(SearchInterface::class);
    }

    /**
     * {@inheritdoc}
     * @throws BindingResolutionException
     */
    public function reverseGeocoding(): ReverseGeocodingInterface
    {
        return $this->app->make(ReverseGeocodingInterface::class);
    }


    /**
     * {@inheritdoc}
     * @throws BindingResolutionException
     */
    public function geocoding(): GeocodingInterface
    {
        return $this->app->make(GeocodingInterface::class);
    }

    /**
     * {@inheritdoc}
     * @throws BindingResolutionException
     */
    public function direction(): DirectionInterface
    {
        return $this->app->make(DirectionInterface::class);
    }

    /**
     * {@inheritdoc}
     * @throws BindingResolutionException
     */
    public function mapMatching(): MapMatchingInterface
    {
        return $this->app->make(MapMatchingInterface::class);
    }


}
