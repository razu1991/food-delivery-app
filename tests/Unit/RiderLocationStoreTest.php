<?php

namespace Tests\Unit;

use App\Http\Controllers\RiderLocationController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Tests\TestCase;


class RiderLocationStoreTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Check rider location store successfully or not
     *
     * @return void
     */
    public function test_store_rider_location_info()
    {
        // Create demo valid data for restaurant
        $request = new Request([
            'rider_id' => 1,
            'service_name' => 'test_service',
            'lat' => 12.3456,
            'lng' => 45.6789,
            'capture_time' => '2024-03-30 12:34:56',
        ]);

        // Controller instance
        $controller = new RiderLocationController();

        // Call the store method
        $response = $controller->store($request);

        // Check the response is a JsonResponse
        $this->assertInstanceOf(JsonResponse::class, $response);

        // Check the response has a success status code (201)
        $this->assertEquals(201, $response->getStatusCode());
    }
}
