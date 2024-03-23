<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'path' => $this->faker->imageUrl(),
            'width' => 600,
            'height' => 600,
            //'product_id' => \App\Models\Product::factory(),
            //'product_id' => $this->faker->numberBetween(1, 10),

        ];
    }
}
