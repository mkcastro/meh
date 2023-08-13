<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface GetLocationsWithinRadiusInterface
{
    public function getLocations(float $radius, float $latitude, float $longitude): Collection;
}
