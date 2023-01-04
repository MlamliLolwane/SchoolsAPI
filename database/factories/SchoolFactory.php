<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fake = $this->faker;

        return [
            'school_name' => $this->faker->company(),
            'email' => $fake->unique()->safeEmail(),
            'primary_phone_number' => $fake->mobileNumber(),
            'secondary_phone_number' => $fake->mobileNumber(),
            'physical_address' => $fake->address(),
            'postal_address' => $fake->address()
        ];
    }
}
