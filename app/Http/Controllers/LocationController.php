<?php

namespace App\Http\Controllers;

use App\Factories\GetLocationsFactoryCalculator;
use App\Http\Requests\IndexLocationRequest;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use App\Services\LocationsWithinKmRadius;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexLocationRequest $request)
    {
        $latitude = $request->getLatitude();
        $longitude = $request->getLongitude();
        $radius = $request->getRadius();
        $unit = $request->getUnit();

        // Use the factory to create the appropriate calculator
        // $calculator = GetLocationsFactoryCalculator::createCalculator($unit);
        $calculator = new LocationsWithinKmRadius();

        $locations = $calculator->getLocations($radius, $latitude, $longitude);

        // Transform the locations using the resource
        $transformedLocations = LocationResource::collection($locations);

        return $transformedLocations;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocationRequest $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        //
    }
}
