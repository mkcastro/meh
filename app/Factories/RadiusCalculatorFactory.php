<?php

namespace App\Factories;

use App\Interfaces\GetLocationsWithinRadiusInterface;
use App\Services\KilometerRadiusCalculator;
use App\Services\LocationsWithinKmRadius;
use App\Services\MileRadiusCalculator;
use App\Services\OtherUnitRadiusCalculator;

class GetLocationsFactoryCalculator
{
    public static function createCalculator(string $unit): GetLocationsWithinRadiusInterface
    {
        switch ($unit) {
            case 'km':
                return new LocationsWithinKmRadius();
            case 'miles':
                return new LocationsWithinMileRadius();
            default:
                throw new InvalidArgumentException("Unsupported radius unit: $unit");
        }
    }
}
