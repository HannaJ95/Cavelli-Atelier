<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProductType;

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
        $createdAt = fake()->dateTimeBetween('-2 years', 'now');

        return [
            'product_type_id' => fake()->randomElement(ProductType::pluck('id')),
            'name'            => fake()->words(3, true),
            'price'           => fake()->numberBetween(2000, 25000),
            'height'          => fake()->numberBetween(200, 2000),
            'width'           => fake()->numberBetween(300, 2000),
            'length'          => fake()->numberBetween(300, 3000),
            'weight'          => fake()->randomFloat(1, 2, 150),
            'created_at'      => $createdAt,
            'updated_at'      => $createdAt,
        ];
    }
}
