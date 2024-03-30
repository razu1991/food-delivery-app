<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Restaurant seeder
        $this->call(RestaurantSeeder::class);
        //$this->call(RiderLocationSeeder::class);
    }
}
