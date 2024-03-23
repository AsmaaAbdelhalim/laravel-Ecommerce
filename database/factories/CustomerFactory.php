<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'email' => $this->faker->safeEmail,
        'accepts_marketing' => $this->faker->boolean,
        'first_name' => $this->faker->firstName,
        'last_name' => $this->faker->lastName,
        'orders_count' => $this->faker->numberBetween(1, 100),
        'state' => $this->faker->state,
        'total_spent' => $this->faker->randomFloat(2, 0, 1000),
        'last_order_id' => $this->faker->numberBetween(1, 100),
        'verified_email' => $this->faker->boolean,
        'phone' => $this->faker->phoneNumber,
        'last_order_name' => $this->faker->word,
        'currency' => $this->faker->currencyCode,
        'addresses' => $this->faker->address,
        'default_address' => $this->faker->address,
        'registered_at' => $this->faker->dateTimeBetween('-10 years', 'now'),
        'gender' => $this->faker->randomElement(['male', 'female']),
        ];
    }
}
