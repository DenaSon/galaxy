<?php

namespace Denason\Neshan\Services;


use Denason\Neshan\Contracts\MapMatchingInterface;
use Denason\Neshan\Exceptions\NeshanException;
use Illuminate\Http\Client\ConnectionException;

class MapMatchingService extends BaseNeshanService implements MapMatchingInterface
{


    protected array $points = [];

    /**
     * @throws NeshanException
     */
    public function addPoint(float $lat, float $lng): static
    {
        $this->validateCoordinates($lat, $lng);
        $this->points[] = "$lat,$lng";
        return $this;
    }

    /**
     * @throws NeshanException
     */
    public function addPoints(array $coords): static
    {
        foreach ($coords as $coord) {
            $this->validateCoordinatePair($coord);
            [$lat, $lng] = $coord;
            $this->addPoint($lat, $lng);
        }

        return $this;
    }

    /**
     * @throws NeshanException
     */
    public function get(): array
    {
        $url = $this->buildEndpoint(static::ENDPOINT_MAP_MATCHING);
        if (count($this->points) < 2) {
            throw new NeshanException("At least 2 points are required for map matching.");
        }

        return $this->sendRequest($url, [
            'path' => implode('|', $this->points)
        ],[],'POST');
    }
}
