<?php

namespace Denason\Neshan\Contracts;

use Denason\Neshan\Exceptions\NeshanException;

/**
 * Interface SearchInterface
 *
 * Defines the contract for interacting with Neshan's location-based search service.
 * This service allows querying geographic places based on a text search term
 * and a reference point (latitude & longitude).
 *
 * Example usage:
 *
 * ```php
 * $results = $searchService->search('کافه', 35.6892, 51.3890);
 * ```
 *
 * @package Denason\Neshan\Contracts
 */
interface SearchInterface
{
    /**
     * Perform a search query for places around a specified geographic point.
     *
     * This method communicates with Neshan’s search API endpoint using a search keyword
     * and a center point (lat/lng) to retrieve nearby points of interest. The result includes
     * detailed metadata such as address, category, coordinates, and more.
     *
     * @param string $term The keyword or phrase to search for (e.g., "رستوران", "bank").
     * @param float|null $lat Latitude of the search center point (range: -90 to 90).
     * @param float|null $lng Longitude of the search center point (range: -180 to 180).
     *
     * @return array Returns an array of matched places, each including:
     *               - `title` (string): Name of the place
     *               - `address` (string): Address description
     *               - `neighbourhood` (string|null): Neighborhood name
     *               - `region` (string): City and province
     *               - `type` (string): Place type (e.g., religious, restaurant, etc.)
     *               - `category` (string): Category (e.g., place, region)
     *               - `location` (array):
     *                   - `x` (float): Longitude
     *                   - `y` (float): Latitude
     */
    public function findByCoordinate(string $term, ?float $lat, ?float $lng): array;

    /**
     * Perform a search query for places within a specified Iranian province.
     *
     * This method accepts the name of a province and a search keyword, then internally
     * resolves the province's central geographic coordinates. It performs a location-based
     * search around that central point to find relevant places. This abstracts away the need
     * for callers to know exact latitude and longitude values.
     *
     * @param string $term The keyword or phrase to search for (e.g., "رستوران", "پارک").
     * @param string $province The name of the Iranian province (e.g., "تهران", "اصفهان").
     *
     * @return array Returns an array of matched places similar to `findByCoordinate`, each including:
     *               - `title` (string): Name of the place
     *               - `address` (string): Address description
     *               - `neighbourhood` (string|null): Neighborhood name
     *               - `region` (string): City and province
     *               - `type` (string): Place type (e.g., religious, restaurant, etc.)
     *               - `category` (string): Category (e.g., place, region)
     *               - `location` (array):
     *                   - `x` (float): Longitude
     *                   - `y` (float): Latitude
     *
     * @throws NeshanException Throws exception if the province name is invalid
     *         or if the underlying HTTP request to the Neshan API fails.
     */
    public function findByProvince(string $term, string $province): array;

}
