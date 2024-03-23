<?php

namespace Database\Factories;
use App\Models\Category;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'image' => $this->faker->imageUrl(),
            'type' => $this->faker->randomElement(['simple', 'variable']),
            'vendor' => $this->faker->company,
            'handle' => $this->faker->slug,
            'owner' => $this->faker->name,
            'compare_at_price' => $this->faker->randomFloat(2, 10, 100),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'stock_status' => $this->faker->randomElement(['in_stock', 'out_of_stock']),
            'quantity' => $this->faker->numberBetween(1, 100),
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'tags' => $this->faker->words(3, true),
            'full_permalink' => $this->faker->url(),
            'content' => $this->faker->paragraphs(3, true),
            'meta' => $this->faker->word,
            'category_id' =>$this->faker->randomElement(Category::pluck('id')->toArray()),
            'image_id' => function() {
                return Image::factory()->create([        
                    'name' => $this->faker->name,
                    'path' => $this->faker->imageUrl(),
                    'width' => $this->faker->numberBetween(100,600),
                    'height' => $this->faker->numberBetween(100,600),
                    ])->id;
                },

        ];
    }
}
