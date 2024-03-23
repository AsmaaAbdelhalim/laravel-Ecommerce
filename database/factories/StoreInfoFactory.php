<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StoreInfo>
 */
class StoreInfoFactory extends Factory
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
        'currency' => $this->faker->currencyCode(),
        'time_zone' => $this->faker->timezone(),
        'email' => $this->faker->companyEmail(),
        'description' => $this->faker->text(),
        'country' => $this->faker->country(),
        'country_code' => $this->faker->countryCode(),
        ];
    }
}
