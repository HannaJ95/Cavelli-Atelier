<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            'Black'        => '#000000',
            'White'        => '#FFFFFF',
            'Oak'          => '#D4A574',
            'Walnut'       => '#5C4033',
            'Grey'         => '#808080',
            'Beige'        => '#F5F5DC',
            'Charcoal'     => '#36454F',
            'Cream'        => '#FFFDD0',
            'Navy'         => '#1B2A4A',
            'Forest Green' => '#2D5A27',
            'Terracotta'   => '#C0604A',
            'Sand'         => '#C2B280',
            'Brown'        => '#7B4F2E',
            'Dusty Rose'   => '#C2908A',
        ];

        foreach ($colors as $name => $hex) {
            Color::create(['name' => $name, 'hex_code' => $hex]);
        }
    }
}
