<?php

namespace Denason\Neshan\Contracts;



interface NeshanManagerInterface
{
    /**
     * Get the Static Map service instance.
     *
     * @return StaticMapInterface
     */
    public function staticMap(): StaticMapInterface;

    /**
     * Get the Search service instance.
     *
     * @return SearchInterface
     */
    public function search(): SearchInterface;

    /**
     * Get the address details By Coordinates
     *
     * @return ReverseGeocodingInterface
     */
    public function reverseGeocoding(): ReverseGeocodingInterface;

    /**
     * Get the Coordinates By Address string
     *
     * @return GeocodingInterface
     */
    public function geocoding(): GeocodingInterface;

    /**
     * Get the Coordinates By Address string
     *
     * @return DirectionInterface
     */
    public function direction(): DirectionInterface;
    /**
     * Map Match Service
     *
     * @return MapMatchingInterface
     */
    public function mapMatching(): MapMatchingInterface;

}
