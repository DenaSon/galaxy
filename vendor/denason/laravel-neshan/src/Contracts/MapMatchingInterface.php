<?php

namespace Denason\Neshan\Contracts;

interface MapMatchingInterface
{
    public function addPoint(float $lat, float $lng): static;

    public function addPoints(array $coords): static;

    public function get(): array;
}
