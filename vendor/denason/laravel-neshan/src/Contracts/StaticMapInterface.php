<?php

namespace Denason\Neshan\Contracts;


use Denason\Neshan\Exceptions\NeshanException;

interface StaticMapInterface
{


    /**
     * Generate a static map image URL based on center coordinates and optional marker.
     *
     * @param float $lat Latitude of the center point.
     * @param float $lng Longitude of the center point.
     * @param int $zoom Zoom level (default is 14).
     * @param int $width Width of the map in pixels (default is 500).
     * @param int $height Height of the map in pixels (default is 500).
     * @param string|null $type Map style (default is 'dreamy').
     * @param string|null $markerToken Optional marker token to show on the map.
     *
     * @return string Returns the generated static map URL.
     *
     * @throws NeshanException
     */
    public function generate(
        float   $lat,
        float   $lng,
        int     $zoom = 14,
        int     $width = 500,
        int     $height = 500,
        ?string $type = 'dreamy',
        ?string $markerToken = null
    ): string;

    /**
     * Generate a static map image URL showing an arc (curved line) between two coordinates.
     *
     * @param float $fromLatitude Latitude of the start point.
     * @param float $fromLongitude Longitude of the start point.
     * @param float $toLatitude Latitude of the destination point.
     * @param float $toLongitude Longitude of the destination point.
     * @param int $width Width of the map image in pixels (default is 600).
     * @param int $height Height of the map image in pixels (default is 600).
     * @param string $type Map style (default is 'standard-night').
     * @param bool $dashed Whether the arc line should be dashed (default is true).
     * @param string $color Hex color code for the arc line (default is '#FF0AA5').
     * @param string|null $marker1Token Optional marker token at the start point.
     * @param string|null $marker2Token Optional marker token at the end point.
     *
     * @return string Returns the generated static map URL with arc line.
     *
     * @throws NeshanException
     */
    public function generateArcMap(
        float   $fromLatitude,
        float   $fromLongitude,
        float   $toLatitude,
        float   $toLongitude,
        int     $width = 600,
        int     $height = 600,
        string  $type = 'standard-night',
        bool    $dashed = true,
        string  $color = '#FF0AA5',
        ?string $marker1Token = null,
        ?string $marker2Token = null
    ): string;


    /**
     * Fetch the static map image binary content.
     *
     * @param string $url Fully generated static map URL
     * @return string      Binary image data
     */
    public function fetchImage(string $url): string;

    /**
     * Get map types as an array
     *
     */
    public function getMapTypes(): array;


}
