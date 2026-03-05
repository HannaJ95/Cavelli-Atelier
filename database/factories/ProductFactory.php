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
        $name = fake()->words(3, true);
        return [
            'product_type_id' => fake()->randomElement(ProductType::pluck('id')),
            'name' => ucfirst($name),
            'description' => fake()->sentence(),
            'price' => fake()->randomFloat(2, 10, 1000),
            'height' => fake()->numberBetween(40, 200),
            'width' => fake()->numberBetween(40, 200),
            'length' => fake()->numberBetween(40, 200),
            'weight' => fake()->randomFloat(2, 0.1, 100),
        ];
    }
}
