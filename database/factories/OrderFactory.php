<?php

namespace Database\Factories;

use App\Models\Order;
USE App\Models\Customer;
use App\Models\Product;
use App\Models\LineItem;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Facades\Factory as FacadesFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contact_email' => $this->faker->email,
            'ordered_at' => $this->faker->dateTimeThisYear,
            'financial_status' => $this->faker->randomElement(['paid', 'pending', 'refunded']),
            'total_price' => $this->faker->randomFloat(2, 10, 1000),
            'total_price_usd' => $this->faker->randomFloat(2, 10, 1000),
            'subtotal_price' => $this->faker->randomFloat(2, 10, 500),
            'total_tax' => $this->faker->randomFloat(2, 5, 200),
            'taxes_included' => $this->faker->boolean,
            'total_discounts' => $this->faker->randomFloat(2, 0, 100),
            'total_line_items_price_set' => $this->faker->randomFloat(2, 10, 500),
            'total_weight' => $this->faker->randomFloat(2, 0, 50),
            'total_tip_received' => $this->faker->randomFloat(2, 0, 50),
            //'billing_address' => $this->faker->address,
            'currency' => $this->faker->currencyCode,
            'country_code' => $this->faker->countryCode,
            'customer_locale' => $this->faker->locale,
            'closed_at' => $this->faker->dateTimeThisYear,
            'confirmed' => $this->faker->boolean,
            'discount_codes' => $this->faker->word,
            'payment_gateway_names' => $this->faker->word,
            'phone' => $this->faker->phoneNumber,
            'presentment_currency' => $this->faker->currencyCode,
            'processed_at' => $this->faker->dateTimeThisYear,
            'processing_method' => $this->faker->word,
            'reference' => $this->faker->word,
            'referring_site' => $this->faker->domainName,
            'source_identifier' => $this->faker->word,
            'source_name' => $this->faker->word,
            'source_url' => $this->faker->url,
            'tags' => $this->faker->words(3, true),
            

            'customer_id' => $this->faker->randomElement(Customer::pluck('id')->toArray()),

            'line_item_id'  => function () {
                return LineItem::factory()->create([

                'product_id' => $this->faker->randomElement(Product::pluck('id')->toArray()),
              
                'order_product_id' => $this->faker->word,
                'model'=> $this->faker->word,
                'image'=> $this->faker->imageUrl(400, 600),
                'quantity'=> $this->faker->numberBetween(1,5),
                'price' => $this->faker->randomFloat(2, 9.99 , 999.99 ),
                'total' => $this->faker->randomFloat(2, 9.99 , 9999.99 ),
                'tax' => $this->faker->randomFloat(2, 0.99 , 99.99 ),

            ])->id;
        }

        ];
}
}
