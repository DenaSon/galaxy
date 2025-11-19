<?php

namespace Denason\Neshan\Contracts;

use Denason\Neshan\Exceptions\NeshanException;

interface ReverseGeocodingInterface
{
    /**
     * Retrieves detailed location information for the given geographic coordinates.
     *
     * This method sends a reverse geocoding request to the Neshan API and returns
     * location data such as address, city, state, and other geographical components.
     *
     * @param float $lat Latitude of the location.
     * @param float $lng Longitude of the location.
     * @return array An associative array containing the location details.
     * @throws NeshanException If the API call fails or the response is invalid.
     */
    public function getInfo(float $lat, float $lng): array;

}
