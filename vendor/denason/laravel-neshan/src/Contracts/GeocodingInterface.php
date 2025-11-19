<?php

namespace Denason\Neshan\Contracts;

use Denason\Neshan\Exceptions\NeshanException;
use Illuminate\Http\Client\ConnectionException;

interface GeocodingInterface
{
    /**
     * Sends a geocoding request to the API using the provided address and retrieves the full response.
     *
     * @param string $address The address to geocode.
     * @return array An associative array containing the geocoding result.
     * @throws NeshanException|ConnectionException If the API call fails or a network error occurs.
     */
    public function getCode(string $address): array;

    /**
     * Sets the address for fluent usage and stores the geocoding result internally.
     *
     * @param string $address The address to set and process.
     * @return static
     * @throws NeshanException|ConnectionException If the API call fails or a network error occurs.
     */
    public function address(string $address): static;

    /**
     * Retrieves the latitude (Y coordinate) of the previously set address.
     *
     * @return float
     * @throws NeshanException If no valid geocoding result is available.
     */
    public function latitude(): float;

    /**
     * Retrieves the longitude (X coordinate) of the previously set address.
     *
     * @return float
     * @throws NeshanException If no valid geocoding result is available.
     */
    public function longitude(): float;

    /**
     * Retrieves the geographic coordinates [latitude, longitude] of the address.
     *
     * @return array An array containing [lat, lng].
     * @throws NeshanException If no valid geocoding result is available.
     */
    public function getCoordinates(): array;

    /**
     * Clears the internally cached geocoding result.
     *
     * @return void
     */
    public function clear(): void;
}
