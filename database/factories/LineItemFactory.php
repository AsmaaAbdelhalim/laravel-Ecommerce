<?php

namespace Database\Factories;
use App\Models\LineItem;
use App\Models\Order;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LineItem>
 */
class LineItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            //'order_id' => OrderFactory::factory(),
            //'product_id' => ProductFactory::factory(),
            'quantity' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'model' => $this->faker->word(),
            'name' => $this->faker->word(),
            'image' => $this->faker->imageUrl(),
            'order_product_id' => $this->faker->uuid(),
            'total' => $this->faker->randomFloat(2, 10, 100),
            'tax' => $this->faker->randomFloat(2, 10, 100),
//
  //                  'order_id' => function () {
    //        return factory(Order::class)->create()->id;
      //  },
        //'product_id' => function () {
          //  return factory(Product::class)->create()->id;
        //},

        'product_id' => function () {
            return \App\Models\Product::factory()->create()->id;
        },
            
        ];
    }
}
