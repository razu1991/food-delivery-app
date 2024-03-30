<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurantList = [
            ['name' => 'ABC Restaurant', 'lat' => '23.8272946', 'lng' => '90.3722564'],
            ['name' => 'XYZ Restaurant', 'lat' => '23.8029806', 'lng' => '90.3575688']
        ];

        foreach($restaurantList as $restaurant)
        {
            Restaurant::create($restaurant);
        }
    }
}
