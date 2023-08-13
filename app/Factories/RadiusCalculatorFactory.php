<?php

namespace App\Factories;

use App\Enums\LengthUnits;
use App\Interfaces\GetLocationsWithinRadiusInterface;
use App\Services\LocationsWithinKmRadius;
use App\Services\LocationsWithinMileRadius;
use InvalidArgumentException;

class GetLocationsFactoryCalculator
{
    public static function createCalculator(string $unit): GetLocationsWithinRadiusInterface
    {
        switch ($unit) {
            case LengthUnits::KILOMETER->value:
                return new LocationsWithinKmRadius();
            case LengthUnits::MILE->value:
                return new LocationsWithinMileRadius();
            default:
                throw new InvalidArgumentException("Unsupported radius unit: $unit");
        }
    }
}
