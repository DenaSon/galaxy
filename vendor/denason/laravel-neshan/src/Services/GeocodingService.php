<?php

namespace Denason\Neshan\Services;

use Denason\Neshan\Contracts\GeocodingInterface;
use Denason\Neshan\Exceptions\NeshanException;
use Illuminate\Http\Client\ConnectionException;

class GeocodingService extends BaseNeshanService implements GeocodingInterface
{
    protected ?array $cachedResult = null;

    public function __construct(string $apiKey)
    {
        parent::__construct($apiKey);
    }

    /**
     * Get full geocoding result (non-fluent).
     *
     * @throws NeshanException
     */
    public function getCode(string $address): array
    {
        $this->validateTermString($address);

        $url = $this->buildEndpoint(static::ENDPOINT_GEOCODING);

        return $this->sendRequest(
            $url,
            ['address' => $address]
        );
    }

    /**
     * Fluent method to set address and cache result.
     *
     * @throws NeshanException|ConnectionException
     */
    public function address(string $address): static
    {
        $this->cachedResult = $this->getCode($address);
        return $this;
    }

    /**
     * Get latitude (Y).
     *
     * @throws NeshanException
     */
    public function latitude(): float
    {
        if (!$this->hasCachedResult()) {
            throw new NeshanException("Latitude not available. Call address() first.");
        }

        return (float) $this->cachedResult['location']['y'];
    }

    /**
     * Get longitude (X).
     *
     * @throws NeshanException
     */
    public function longitude(): float
    {
        if (!$this->hasCachedResult()) {
            throw new NeshanException("Longitude not available. Call address() first.");
        }

        return (float) $this->cachedResult['location']['x'];
    }

    /**
     * Get both coordinates at once.
     *
     * @throws NeshanException
     */
    public function getCoordinates(): array
    {
        if (!$this->hasCachedResult()) {
            throw new NeshanException("Coordinates not available. Call address() first.");
        }

        return [
            'lat' => (float) $this->cachedResult['location']['y'],
            'lng' => (float) $this->cachedResult['location']['x'],
        ];
    }

    /**
     * Clear internal cached result.
     */
    public function clear(): void
    {
        $this->cachedResult = null;
    }

    /**
     * Check if a cached result is valid.
     */
    protected function hasCachedResult(): bool
    {
        return isset($this->cachedResult['location']['x'], $this->cachedResult['location']['y']);
    }
}
