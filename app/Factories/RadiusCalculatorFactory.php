<?php

namespace App\Factories;

use App\Services\KilometerRadiusCalculator;
use App\Services\MileRadiusCalculator;
use App\Services\OtherUnitRadiusCalculator;

class RadiusCalculatorFactory
{
    public static function createCalculator(string $unit): InterfacesRadiusCalculatorInterface
    {
        switch ($unit) {
            case 'km':
                return new KilometerRadiusCalculator();
            case 'miles':
                return new MileRadiusCalculator();
            case 'other':
                return new OtherUnitRadiusCalculator();
                // Add more cases for other units
            default:
                throw new InvalidArgumentException("Unsupported radius unit: $unit");
        }
    }
}
