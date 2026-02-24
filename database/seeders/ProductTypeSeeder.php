<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ProductType;
use Illuminate\Database\Seeder;
use App\Models\Category;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // ProductType::factory(10)->create();
        $types = [
            'Furniture' => ['Sofa', 'Chair', 'Table', 'Bed'],
            // 'Interior'  => ['Vase', 'Lamp', 'Mirror', 'Rug'],
            // 'Flowers'   => ['Rose', 'Lily', 'Tulip'],
        ];

        foreach ($types as $categoryName => $productNames) {
            $category = Category::where('name', $categoryName)->first();

            if ($category) {
                foreach ($productNames as $productName) {
                    ProductType::updateOrCreate(
                        ['name' => $productName], // Look for this
                        ['category_id' => $category->id], // Update/Create with this
                    );
                }
            }
        }
    }
}