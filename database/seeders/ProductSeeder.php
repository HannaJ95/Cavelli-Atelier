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
        $productsByType = [
            'Sofa' => [
                ['name' => 'Velvet Dream',    'description' => 'A plush 3-seater sofa upholstered in premium velvet fabric.'],
                ['name' => 'Nordic Oak Sofa', 'description' => 'Minimalist Scandinavian design with solid oak legs and linen cushions.'],
                ['name' => 'Leather Lounge',  'description' => 'Classic full-grain leather sofa with a timeless silhouette.'],
                ['name' => 'Cloud Sectional', 'description' => 'Extra-deep sectional sofa designed for ultimate comfort and relaxation.'],
                ['name' => 'Studio Sofa',     'description' => 'Compact 2-seater perfect for smaller living spaces.'],
            ],
            'Chair' => [
                ['name' => 'Dining Ease',    'description' => 'Comfortable dining chair with a padded seat and solid wood frame.'],
                ['name' => 'Office Pro',     'description' => 'Ergonomic mesh office chair with lumbar support and adjustable height.'],
                ['name' => 'Velvet Throne',  'description' => 'Statement accent chair upholstered in rich velvet with gold-toned legs.'],
                ['name' => 'Rattan Rocker',  'description' => 'Handwoven rattan rocking chair with a natural, bohemian feel.'],
                ['name' => 'Foldable Guest', 'description' => 'Lightweight folding chair ideal for extra seating when needed.'],
            ],
            'Table' => [
                ['name' => 'Grand Dining', 'description' => 'Large solid wood dining table that comfortably seats up to 8 people.'],
                ['name' => 'Coffee Cube',  'description' => 'Sleek low coffee table with a minimalist square silhouette.'],
                ['name' => 'Writers Desk', 'description' => 'Simple and sturdy writing desk ideal for home offices.'],
                ['name' => 'Side Circle',  'description' => 'Round side table perfect as a bedside or living room accent piece.'],
                ['name' => 'Glass Patio',  'description' => 'Tempered glass outdoor table with a weather-resistant metal frame.'],
            ],
            'Bed' => [
                ['name' => 'Royal Sleep',    'description' => 'King size bed frame with an upholstered headboard and solid wood base.'],
                ['name' => 'Junior Loft',    'description' => 'Space-saving bunk bed designed for children\'s bedrooms.'],
                ['name' => 'Master Suite',   'description' => 'Elegant bed frame with built-in storage drawers beneath the base.'],
                ['name' => 'Daybed Zen',     'description' => 'Versatile daybed that functions as both a sofa and a guest bed.'],
                ['name' => 'Platform Basic', 'description' => 'Low-profile platform bed with a clean, modern aesthetic.'],
            ],
        ];

        $products = [];
        foreach ($productsByType as $typeName => $items) {
            foreach ($items as $item) {
                $products[] = ['name' => $item['name'], 'description' => $item['description'], 'type' => $typeName];
            }
        }
        shuffle($products);

        $allColors    = Color::all();
        $allMaterials = Material::all();
        $types        = ProductType::pluck('id', 'name');

        foreach ($products as $item) {
            $typeId = $types[$item['type']] ?? null;

            if ($typeId) {
                $product = Product::factory()->create([
                    'name'            => $item['name'],
                    'description'     => $item['description'],
                    'product_type_id' => $typeId,
                ]);

                $product->colors()->attach($allColors->random(rand(1, 3))->pluck('id'));
                $product->materials()->attach($allMaterials->random(rand(1, 3))->pluck('id'));
            }
        }
    }
}
