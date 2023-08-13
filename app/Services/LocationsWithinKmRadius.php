<?php

namespace App\Services;

use App\Interfaces\GetLocationsWithinRadiusInterface;
use App\Models\Location;
use Illuminate\Database\Eloquent\Collection;

class LocationsWithinKmRadius implements GetLocationsWithinRadiusInterface
{
    public function getLocations(float $radius, float $latitude, float $longitude): Collection
    {
        // Fetch locations from the database within the given radius
        $locations = Location::whereRaw(
            'ST_Distance_Sphere(point(longitude, latitude), point(?, ?)) <= ?',
            [
                $longitude,
                $latitude,
                $radius * 1000,
            ]
        )
            ->get();

        return $locations;
    }
}
