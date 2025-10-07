<?php

namespace Database\Factories;

use App\Models\Flight;
use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'type' => $this->faker->randomElement(['hajj', 'umrah']),
            'price' => $this->faker->randomFloat(2, 1000, 10000),
            'duration' => $this->faker->numberBetween(5, 30),
            'hotel_id' => Hotel::all()->random()->id,
            'flight_id' => Flight::all()->random()->id,
        ];
    }
}
