<?php

namespace Database\Seeders;

use App\Models\RiderLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RiderLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $riderLocationList = [
            [ 'rider_id' => 1, 'service_name' => 'Express Delivery', 'lat' => '23.826417', 'lng' => '90.370198', 'capture_time' => now() ],
            [ 'rider_id' => 2, 'service_name' => 'Express Delivery', 'lat' => '23.827412', 'lng' => '90.3724126', 'capture_time' => now() ],
            [ 'rider_id' => 3, 'service_name' => 'Express Delivery', 'lat' => '23.823876', 'lng' => '90.3616619', 'capture_time' => now() ]
        ];

        foreach($riderLocationList as $riderLocation)
        {
            RiderLocation::create($riderLocation);
        }
    }
}
