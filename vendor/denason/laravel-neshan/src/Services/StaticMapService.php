<?php

namespace Denason\Neshan\Services;

use Denason\Neshan\Contracts\StaticMapInterface;
use Denason\Neshan\Exceptions\NeshanException;

class StaticMapService extends BaseNeshanService implements StaticMapInterface
{
    protected string $apiKey;
    protected array $allowedTypes = ['neshan', 'dreamy', 'standard-day', 'standard-night', 'osm-bright'];

    public function __construct(string $apiKey)
    {
        parent::__construct( $apiKey);

    }

    /**
     * {@inheritdoc}
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
    ): string {
        $this->validateStaticMapGenerate($lat, $lng, $zoom, $width, $height, $type);

        $query = [
            'key'    => $this->apiKey,
            'center' => "$lat,$lng",
            'zoom'   => $zoom,
            'width'  => $width,
            'height' => $height,
            'type'   => $type,
        ];

        if (!empty($markerToken)) {
            $query['markerToken'] = $markerToken;
        }

        return $this->buildEndpoint(static::ENDPOINT_STATIC_MAP) .  http_build_query($query);
    }

    /**
     * @throws NeshanException
     */
    public function fetchImage(string $url): string
    {
        return $this->sendSimpleRequest($url);
    }

    /**
     * {@inheritdoc}
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
    ): string {
        $this->validateCoordinates($fromLatitude, $fromLongitude);
        $this->validateCoordinates($toLatitude, $toLongitude);
        $this->validateStaticMapArc($width, $height, $type);
        $this->validateHexColor($color);

        $query = [
            'key'    => $this->apiKey,
            'type'   => $type,
            'from'   => "$fromLongitude,$fromLatitude",
            'to'     => "$toLongitude,$toLatitude",
            'width'  => $width,
            'height' => $height,
            'dashed' => $dashed ? 'true' : 'false',
            'color'  => $color,
        ];

        if ($marker1Token) {
            $query['marker1Token'] = $marker1Token;
        }

        if ($marker2Token) {
            $query['marker2Token'] = $marker2Token;
        }

        return $this->buildEndpoint(static::ENDPOINT_STATIC_MAP_ARC)  . http_build_query($query);
    }

    /**
     * {@inheritdoc}
     */
    public function getMapTypes(): array
    {
        return $this->allowedTypes;
    }
}
