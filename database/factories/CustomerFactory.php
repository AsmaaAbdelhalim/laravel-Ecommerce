<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{


        /**
     * The current password being used by the factory.
     */
    protected static ?string $password;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'email' => $this->faker->safeEmail,
        
        'email_verified_at' => now(),
        'password' => static::$password ??= Hash::make('password'),
        'remember_token' => Str::random(10),
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
      /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
