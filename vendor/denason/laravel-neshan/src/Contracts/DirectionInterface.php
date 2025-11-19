<?php

namespace Denason\Neshan\Contracts;

use Denason\Neshan\Exceptions\NeshanException;
use Illuminate\Http\Client\ConnectionException;

interface DirectionInterface
{
    /**
     * Enable routing with traffic data.
     *
     * @return static
     */
    public function withTraffic(): static;

    /**
     * Disable routing with traffic data.
     *
     * @return static
     */
    public function withoutTraffic(): static;

    /**
     * Set the origin coordinate.
     *
     * @param float $lat Latitude value.
     * @param float $lng Longitude value.
     * @return static
     * @throws NeshanException
     */
    public function origin(float $lat, float $lng): static;

    /**
     * Set the destination coordinate.
     *
     * @param float $lat Latitude value.
     * @param float $lng Longitude value.
     * @return static
     * @throws NeshanException
     */
    public function destination(float $lat, float $lng): static;

    /**
     * Set vehicle type (car or motorcycle).
     *
     * @param string $type
     * @return static
     * @throws NeshanException
     */
    public function type(string $type): static;

    /**
     * Add intermediate waypoints.
     *
     * @param array<array{float, float}> $points Array of [lat, lng] pairs.
     * @return static
     * @throws NeshanException
     */
    public function waypoints(array $points): static;

    /**
     * Avoid traffic zones (only if explicitly set).
     *
     * @return static
     */
    public function avoidTrafficZone(): static;

    /**
     * Avoid odd-even zones (only if explicitly set).
     *
     * @return static
     */
    public function avoidOddEvenZone(): static;

    /**
     * Request alternative routes.
     *
     * @return static
     */
    public function alternative(): static;

    /**
     * Set initial direction angle (bearing).
     *
     * @param int $degrees Angle in degrees (0–360).
     * @return static
     * @throws NeshanException
     */
    public function bearing(int $degrees): static;

    /**
     * Execute the route request and get the result.
     *
     * @return array<string, mixed>
     * @throws NeshanException|ConnectionException
     */
    public function get(): array;
}
