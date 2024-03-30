<?php

namespace Tests\Unit;

use App\Http\Controllers\RiderLocationController;
use App\Models\RiderLocation;
use App\Models\Restaurant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class RiderLocationFindNearbyRiderTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Find nearby rider with valid restaurant
     *
     * @return void
     */
    public function test_find_nearby_rider_with_valid_restaurant_id()
    {
        // Create demo valid data for restaurant
        $restaurant = Restaurant::factory()->create();

        // Create demo valid data for rider locations
        RiderLocation::factory()->create([
            'rider_id' => 1,
            'lat' => $restaurant->lat + 0.01,
            'lng' => $restaurant->lng + 0.01,
            'capture_time' => now()->subMinutes(5),
        ]);

        RiderLocation::factory()->create([
            'rider_id' => 2,
            'lat' => $restaurant->lat - 0.01,
            'lng' => $restaurant->lng - 0.01,
            'capture_time' => now()->subMinutes(5),
        ]);


        $request = new Request([
            'restaurant_id' => $restaurant->id,
        ]);

        // Controller instance
        $controller = new RiderLocationController();

        // Call the findNearbyRider method
        $response = $controller->findNearbyRider($request);

        // Check the response is a JsonResponse
        $this->assertInstanceOf(JsonResponse::class, $response);

        // Check the response has a success status code (200)
        $this->assertEquals(200, $response->getStatusCode());

        // Check the response contains the expected data
        $responseData = $response->getData(true);
        $this->assertNotEmpty($responseData['data']);
    }
}
