<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\Restaurant;
use App\Models\RiderLocation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RiderLocationController extends Controller
{
    /**
     * Store rider location info
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request): JsonResponse
    {
        try {

            $data = $request->all();

            $rules = [
                'rider_id' => 'required',
                'service_name' => 'required|string',
                'lat' => 'required|numeric',
                'lng' => 'required|numeric',
                'capture_time' => 'required|date_format:Y-m-d H:i:s'
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                return ApiResponse::error($validator->errors(),'Rider location data store failed',422);
            }

            //store rider location info
            RiderLocation::create($data);

            return ApiResponse::success([],'Rider location data stored successfully',201);

        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(),'Operation failed', 500);
        }
    }

    /**
     * Find near by rider
     *
     * @param Request $request
     * @return void
     */
    public function findNearbyRider(Request $request): JsonResponse
    {
        try {

            $rule = [
                'restaurant_id' => 'required|exists:restaurants,id'
            ];

            $validator = Validator::make($request->all(), $rule);

            if ($validator->fails()) {
                return ApiResponse::error($validator->errors(),'Restaurant not found',422);
            }

            $restaurant = Restaurant::findOrFail($request->restaurant_id);

            // Get the nearest rider within the last 5 minutes
            $nearestRider = RiderLocation::select(
                    'rider_locations.rider_id',
                    DB::raw("
                        (6371 * acos(cos(radians($restaurant->lat)) * cos(radians(lat)) * cos(radians(lng) - radians($restaurant->lng)) + sin(radians($restaurant->lat)) * sin(radians(lat)))) AS distance
                    ")
                )
                ->where('capture_time', '>=', now()->subMinutes(5))
                ->orderBy('distance')
                ->get();

            if ($nearestRider->isEmpty()) {
                return ApiResponse::error('No nearby rider found', 'No Rider', 404);
            }

            return ApiResponse::success($nearestRider,'Restaurant wise nearest rider list', 200);

        } catch (\Throwable $th) {

            return ApiResponse::error($th->getMessage(),'Operation failed', 500);
        }

    }
}
