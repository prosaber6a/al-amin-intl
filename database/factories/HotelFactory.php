<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'location' => $this->faker->city(),
            'room_type' => $this->faker->randomElement(['Single', 'Double', 'Suite', 'Deluxe']),
            'room_capacity' => $this->faker->numberBetween(1, 6),
            'price_per_night' => $this->faker->randomFloat(2, 50, 500),
        ];
    }
}
