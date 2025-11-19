<?php

namespace Denason\Neshan\Services;

use Denason\Neshan\Contracts\DirectionInterface;
use Denason\Neshan\Exceptions\NeshanException;
use Illuminate\Http\Client\ConnectionException;

class DirectionService extends BaseNeshanService implements DirectionInterface
{
    protected ?string $origin = null;
    protected ?string $destination = null;
    protected ?string $type = null;
    protected ?string $waypoints = null;
    protected ?bool $avoidTrafficZone = null;
    protected ?bool $avoidOddEvenZone = null;
    protected ?bool $alternative = null;
    protected ?int $bearing = null;
    protected bool $useTraffic = true;

    public function __construct(string $apiKey)
    {
        parent::__construct($apiKey);
    }

    protected function reset(): void
    {
        $this->origin = null;
        $this->destination = null;
        $this->type = null;
        $this->waypoints = null;
        $this->avoidTrafficZone = null;
        $this->avoidOddEvenZone = null;
        $this->alternative = null;
        $this->bearing = null;
        $this->useTraffic = true;
    }
    /**
     * {@inheritdoc}
     */
    public function withTraffic(): static
    {
        $this->useTraffic = true;
        return $this;
    }
    /**
     * {@inheritdoc}
     */
    public function withoutTraffic(): static
    {
        $this->useTraffic = false;
        return $this;
    }

    /**
     * @throws NeshanException
     * {@inheritdoc}
     */
    public function origin(float $lat, float $lng): static
    {
        $this->validateCoordinates($lat, $lng);
        $this->origin = "{$lat},{$lng}";
        return $this;
    }

    /**
     * @throws NeshanException
     * {@inheritdoc}
     */
    public function destination(float $lat, float $lng): static
    {
        $this->validateCoordinates($lat, $lng);
        $this->destination = "{$lat},{$lng}";
        return $this;
    }

    /**
     * @throws NeshanException
     * {@inheritdoc}
     */
    public function type(string $type): static
    {
        $this->validateVehicleType($type);


        $this->type = $type;
        return $this;
    }

    /**
     * @param array<array{0: float, 1: float}> $points
     * {@inheritdoc}
     */
    public function waypoints(array $points): static
    {
        $formatted = collect($points)->map(function ($coord) {
            $this->validateCoordinatePair($coord);

            [$lat, $lng] = $coord;
            $this->validateCoordinates($lat, $lng);

            return "{$lat},{$lng}";
        })->implode('|');

        $this->waypoints = $formatted;
        return $this;
    }
    /**
     * {@inheritdoc}
     */
    public function avoidTrafficZone(): static
    {
        $this->avoidTrafficZone = true;
        return $this;
    }
    /**
     * {@inheritdoc}
     */
    public function avoidOddEvenZone(): static
    {
        $this->avoidOddEvenZone = true;
        return $this;
    }
    /**
     * {@inheritdoc}
     */
    public function alternative(): static
    {
        $this->alternative = true;
        return $this;
    }
    /**
     * {@inheritdoc}
     */
    public function bearing(int $degrees): static
    {
       $this->validateDegree($degrees);

        $this->bearing = $degrees;
        return $this;
    }

    /**
     * @throws NeshanException
     * {@inheritdoc}
     */
    public function get(): array
    {
        $this->validatePresenceOfOriginAndDestination();
        $this->validateTrafficCompatibility();

        if ($this->useTraffic && $this->avoidTrafficZone) {
            throw new NeshanException("Incompatible options: 'avoidTrafficZone' cannot be used with 'withTraffic()' if the destination may lie within a traffic zone. Use 'withoutTraffic()' instead.");
        }

        $endpoint = $this->useTraffic
            ? static::ENDPOINT_DIRECTION_WITH_TRAFFIC
            : static::ENDPOINT_DIRECTION_WITHOUT_TRAFFIC;

        $url = $this->buildEndpoint($endpoint);

        $query = [
            'origin' => $this->origin,
            'destination' => $this->destination,
        ];

        if ($this->type) $query['type'] = $this->type;
        if ($this->waypoints) $query['waypoints'] = $this->waypoints;
        if (!is_null($this->avoidTrafficZone)) $query['avoidTrafficZone'] = $this->avoidTrafficZone ? 'true' : 'false';
        if (!is_null($this->avoidOddEvenZone)) $query['avoidOddEvenZone'] = $this->avoidOddEvenZone ? 'true' : 'false';
        if (!is_null($this->alternative)) $query['alternative'] = $this->alternative ? 'true' : 'false';
        if (!is_null($this->bearing)) $query['bearing'] = $this->bearing;

        try {
            return $this->sendRequest($url, $query);
        } finally {
            $this->reset();
        }
    }
}
