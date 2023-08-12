<?php

namespace App\Interfaces;

interface GetLocationsWithinRadiusInterface
{
    public function getLocationsWithinRadius(float $radius, float $latitude, float $longitude): array;
}
