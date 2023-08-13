<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexLocationFeatureTest extends TestCase
{
    use RefreshDatabase;

    public $seed = true;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        // Create test data or use factories to seed your locations

        // Define the route name

        // Define parameters for the request
        $parameters = [
            'latitude' => 51.475603934275675,
            'longitude' => -2.3807167145198114,
            'radius' => 1,
            'unit' => 'km',
        ];

        // Make a GET request to the named route
        $response = $this->get(route('locations.index', $parameters));

        // Assert a successful response
        $response->assertStatus(200);

        // Assert the response structure or specific data if needed
        // For example, you can assert the JSON structure or key presence
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'latitude',
                    'longitude',
                    'created_at',
                    'updated_at',
                ],
            ],
        ]);

        // You can also assert the number of returned locations
        $response->assertJsonCount(1, 'data');

        // Additional assertions based on your requirements
    }
}

// tests/Feature/LocationTest.php

namespace Tests\Feature;
