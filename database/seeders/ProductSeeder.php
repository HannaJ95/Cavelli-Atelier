<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductType;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productTypes = ProductType::all();

        foreach ($productTypes as $type) {
            Product::factory()->count(5)->create([
                'product_type_id' => $type->id,
            ]);
        }
    }
}
