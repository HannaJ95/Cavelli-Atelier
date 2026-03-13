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
        
        $typesByCategory = [
            'Furniture' => ['Sofa', 'Chair', 'Table', 'Bed'],
        ];


        foreach ($typesByCategory as $categoryName => $productNames) {
            $category = Category::where('name', $categoryName)->first();

            if ($category) {
                foreach ($productNames as $productName) {
                    ProductType::updateOrCreate(
                        ['name' => $productName],
                        ['category_id' => $category->id],
                    );
                }
            }
        }
    }
}