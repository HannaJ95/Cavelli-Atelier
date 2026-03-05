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
        $data = [
            'Sofa' => [
                ['name' => 'Velvet Dream', 'desc' => 'Soft 3-seater','price' => 8900, 'size' => '220x90x80', 'weight' => 45],
                ['name' => 'Nordic Oak Sofa', 'desc' => 'Minimalist style', 'price' => 12500, 'size' => '200x85x75', 'weight' => 55],
                ['name' => 'Leather Lounge', 'desc' => 'Classic brown leather', 'price' => 15000, 'size' => '210x95x85', 'weight' => 60],
                ['name' => 'Cloud Sectional', 'desc' => 'Extremely comfortable', 'price' => 18900, 'size' => '300x150x80', 'weight' => 80],
                ['name' => 'Studio Sofa', 'desc' => 'Small apartment fit', 'price' => 4500, 'size' => '160x80x75', 'weight' => 30],
            ],
            'Chair' => [
                ['name' => 'Dining Ease', 'desc' => 'Padded seat', 'price' => 1200, 'size' => '45x45x90', 'weight' => 7],
                ['name' => 'Office Pro', 'desc' => 'Ergonomic mesh', 'price' => 3200, 'size' => '60x60x110', 'weight' => 12],
                ['name' => 'Velvet Throne', 'desc' => 'Accent chair', 'price' => 2800, 'size' => '70x70x100', 'weight' => 15],
                ['name' => 'Rattan Rocker', 'desc' => 'Handmade rattan', 'price' => 1900, 'size' => '60x80x95', 'weight' => 10],
                ['name' => 'Foldable Guest', 'desc' => 'Space saving', 'price' => 450, 'size' => '40x40x80', 'weight' => 4],
            ],
            'Table' => [
                ['name' => 'Grand Dining', 'desc' => 'Seats 8 people', 'price' => 9500, 'size' => '240x100x75', 'weight' => 70],
                ['name' => 'Coffee Cube', 'desc' => 'Modern low table', 'price' => 4200, 'size' => '80x80x40', 'weight' => 90],
                ['name' => 'Writer’s Desk', 'desc' => 'Simple work desk', 'price' => 2100, 'size' => '120x60x75', 'weight' => 20],
                ['name' => 'Side Circle', 'desc' => 'Bedside table', 'price' => 850, 'size' => '40x40x50', 'weight' => 8],
                ['name' => 'Glass Patio', 'desc' => 'Outdoor table', 'price' => 1500, 'size' => '90x90x75', 'weight' => 15],
            ],
            'Bed' => [
                ['name' => 'Royal Sleep', 'desc' => 'King size frame', 'price' => 14000, 'size' => '180x200', 'weight' => 110],
                ['name' => 'Junior Loft', 'desc' => 'Kids bunk bed', 'price' => 3500, 'size' => '90x200', 'weight' => 45],
                ['name' => 'Master Suite', 'desc' => 'Hidden storage', 'price' => 11500, 'size' => '160x200', 'weight' => 130],
                ['name' => 'Daybed Zen', 'desc' => 'Guest bed & sofa', 'price' => 5200, 'size' => '90x200', 'weight' => 40],
                ['name' => 'Platform Basic', 'desc' => 'Low profile', 'price' => 2500, 'size' => '140x200', 'weight' => 35],
            ],
        ];

        
        foreach ($data as $typeName => $products) {
            $type = ProductType::where('name', $typeName)->first();
            if ($type) {
                foreach ($products as $product) {
                    Product::create([
                        'product_type_id' => $type->id,
                        'name' => $product['name'],
                        'description' => $product['desc'],
                        'price' => $product['price'],
                        'size' => $product['size'],
                        'weight' => $product['weight'],
                    ]);
                }
            }
        }
    }
}
