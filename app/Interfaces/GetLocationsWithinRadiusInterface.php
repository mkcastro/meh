<?php

namespace App\Interfaces;

interface GetLocationsWithinRadiusInterface
{
    public function getLocations(float $radius, float $latitude, float $longitude): array;
}
