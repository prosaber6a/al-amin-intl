<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'flight_no' => $this->faker->unique()->bothify('??####'),
            'airline' => $this->faker->company(),
            'from' => $this->faker->city(),
            'to' => $this->faker->city(),
            'departure' => $this->faker->dateTimeBetween('+1 days', '+1 month'),
            'arrival' => $this->faker->dateTimeBetween('+1 days', '+1 month'),
            'price' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
