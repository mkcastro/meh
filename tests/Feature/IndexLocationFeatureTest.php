<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexLocationFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        // Create test data or use factories to seed your locations

        // Define the route name

        // Define parameters for the request
        $parameters = [
            'latitude' => 34.0522,
            'longitude' => -118.2437,
            'radius' => 10,
            'unit' => 'km',
        ];

        // Make a GET request to the named route
        $response = $this->get(route('locations.index', $parameters));

        // Assert a successful response
        $response->assertStatus(200);

        // Assert the response structure or specific data if needed
        // For example, you can assert the JSON structure or key presence
        // $response->assertJsonStructure([...]);

        // You can also assert the number of returned locations
        // $response->assertJsonCount(5, 'data');

        // Additional assertions based on your requirements
    }
}

// tests/Feature/LocationTest.php

namespace Tests\Feature;
