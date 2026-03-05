<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Color;
use App\Models\Material;
use App\Models\Product;
use App\Models\ProductType;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Sofa' => [
                ['name' => 'Velvet Dream', 'desc' => 'Soft 3-seater', 'price' => 8900, 'height' => 800, 'width' => 900, 'length' => 2200, 'weight' => 45],
                ['name' => 'Nordic Oak Sofa', 'desc' => 'Minimalist style', 'price' => 12500, 'height' => 750, 'width' => 850, 'length' => 2000, 'weight' => 55],
                ['name' => 'Leather Lounge', 'desc' => 'Classic brown leather', 'price' => 15000, 'height' => 850, 'width' => 950, 'length' => 2100, 'weight' => 60],
                ['name' => 'Cloud Sectional', 'desc' => 'Extremely comfortable', 'price' => 18900, 'height' => 800, 'width' => 1500, 'length' => 3000, 'weight' => 80],
                ['name' => 'Studio Sofa', 'desc' => 'Small apartment fit', 'price' => 4500, 'height' => 750, 'width' => 800, 'length' => 1600, 'weight' => 30],
            ],
            'Chair' => [
                ['name' => 'Dining Ease', 'desc' => 'Padded seat', 'price' => 1200, 'height' => 900, 'width' => 450, 'length' => 450, 'weight' => 7],
                ['name' => 'Office Pro', 'desc' => 'Ergonomic mesh', 'price' => 3200, 'height' => 1100, 'width' => 600, 'length' => 600, 'weight' => 12],
                ['name' => 'Velvet Throne', 'desc' => 'Accent chair', 'price' => 2800, 'height' => 1000, 'width' => 700, 'length' => 700, 'weight' => 15],
                ['name' => 'Rattan Rocker', 'desc' => 'Handmade rattan', 'price' => 1900, 'height' => 950, 'width' => 800, 'length' => 600, 'weight' => 10],
                ['name' => 'Foldable Guest', 'desc' => 'Space saving', 'price' => 450, 'height' => 800, 'width' => 400, 'length' => 400, 'weight' => 4],
            ],
            'Table' => [
                ['name' => 'Grand Dining', 'desc' => 'Seats 8 people', 'price' => 9500, 'height' => 750, 'width' => 1000, 'length' => 2400, 'weight' => 70],
                ['name' => 'Coffee Cube', 'desc' => 'Modern low table', 'price' => 4200, 'height' => 400, 'width' => 800, 'length' => 800, 'weight' => 90],
                ['name' => 'Writers Desk', 'desc' => 'Simple work desk', 'price' => 2100, 'height' => 750, 'width' => 600, 'length' => 1200, 'weight' => 20],
                ['name' => 'Side Circle', 'desc' => 'Bedside table', 'price' => 850, 'height' => 500, 'width' => 400, 'length' => 400, 'weight' => 8],
                ['name' => 'Glass Patio', 'desc' => 'Outdoor table', 'price' => 1500, 'height' => 750, 'width' => 900, 'length' => 900, 'weight' => 15],
            ],
            'Bed' => [
                ['name' => 'Royal Sleep', 'desc' => 'King size frame', 'price' => 14000, 'height' => 500, 'width' => 1800, 'length' => 2000, 'weight' => 110],
                ['name' => 'Junior Loft', 'desc' => 'Kids bunk bed', 'price' => 3500, 'height' => 1600, 'width' => 900, 'length' => 2000, 'weight' => 45],
                ['name' => 'Master Suite', 'desc' => 'Hidden storage', 'price' => 11500, 'height' => 450, 'width' => 1600, 'length' => 2000, 'weight' => 130],
                ['name' => 'Daybed Zen', 'desc' => 'Guest bed and sofa', 'price' => 5200, 'height' => 400, 'width' => 900, 'length' => 2000, 'weight' => 40],
                ['name' => 'Platform Basic', 'desc' => 'Low profile', 'price' => 2500, 'height' => 200, 'width' => 1400, 'length' => 2000, 'weight' => 35],
            ],
        ];


        $allColors = Color::all();
        $allMaterials = Material::all();

        foreach ($data as $typeName => $products) {
            $type = ProductType::where('name', $typeName)->first();
            if ($type) {
                foreach ($products as $product) {
                    $created = Product::create([
                        'product_type_id' => $type->id,
                        'name' => $product['name'],
                        'description' => $product['desc'],
                        'price' => $product['price'],
                        'height' => $product['height'],
                        'width' => $product['width'],
                        'length' => $product['length'],
                        'weight' => $product['weight'],
                    ]);

                    $created->colors()->attach($allColors->random(rand(1, 3))->pluck('id'));
                    $created->materials()->attach($allMaterials->random(rand(1, 3))->pluck('id'));
                }
            }
        }
    }
}
