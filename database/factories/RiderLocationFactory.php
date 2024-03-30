<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RiderLocation>
 */
class RiderLocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rider_id' => Str::random(4),
            'service_name' => fake()->company(),
            'lat' => fake()->latitude(),
            'lng' => fake()->longitude(),
            'capture_time' => now()
        ];
    }
}
