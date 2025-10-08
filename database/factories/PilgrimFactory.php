<?php

namespace Database\Factories;

use App\Models\Agent;
use App\Models\Group;
use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pilgrim>
 */
class PilgrimFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'agent_id' => Agent::all()->random()->id,
            'group_id' => Group::all()->random()->id,
            'package_id' => Package::all()->random()->id,
            'type' => $this->faker->randomElement(['hajj', 'umrah']),
            'given_name' => $this->faker->firstName(),
            'sure_name' => $this->faker->lastName(),
            'dob' => $this->faker->date(),
            'sex' => $this->faker->randomElement(['male', 'female']),
            'place_of_birth' => $this->faker->city(),
            'passport_no' => $this->faker->bothify('??######'),
            'p_issue_date' => $this->faker->date(),
            'p_expiry_date' => $this->faker->date(),
            'mobile' => $this->faker->phoneNumber(),
            'email' => $this->faker->optional()->safeEmail(),
            'address' => $this->faker->address(),
            'files' => serialize([['title' => 'Passport', 'file' => $this->faker->filePath()], ['title' => 'Photo', 'file' => $this->faker->filePath()]]),
            'pre_registration_no' => $this->faker->optional()->bothify('PRN######'),
            'mofa_no' => $this->faker->optional()->bothify('MOFA######'),
            'registration_status' => $this->faker->optional()->randomElement(['Pending', 'Approved', 'Rejected']),
            'registration_date' => $this->faker->optional()->date(),
            'mahrem_name' => $this->faker->optional()->name(),
            'mahrem_relation' => $this->faker->optional()->randomElement(['Father', 'Husband', 'Brother']),
            'is_first_time' => $this->faker->boolean(),
            'medical_certificate_no' => $this->faker->optional()->bothify('MCN######'),
            'remarks' => $this->faker->optional()->text(),
        ];
    }
}
