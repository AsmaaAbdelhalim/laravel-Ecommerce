<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'taxonomy' => $this->faker->randomElement(['product_type', 'product_tag']),
            'handle' => $this->faker->unique()->word,
            'content' => $this->faker->paragraph,
            'published_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'available' => $this->faker->randomElement(['1', '0']),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
