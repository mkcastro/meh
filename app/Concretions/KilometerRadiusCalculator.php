<?php

namespace App\Services;

use App\Interfaces\GetLocationsWithinRadiusInterface;
use App\Models\Location;

class LocationsWithinKmRadius implements GetLocationsWithinRadiusInterface
{
    public function getLocations(float $radius, float $latitude, float $longitude): array
    {
        // Fetch locations from the database within the given radius
        $locations = Location::select('id', 'name', 'latitude', 'longitude')
            ->whereRaw(
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
