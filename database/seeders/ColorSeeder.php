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
        Color::insert([
            ['name' => 'Black',          'hex_code' => '#000000'],
            ['name' => 'White',          'hex_code' => '#FFFFFF'],
            ['name' => 'Oak',            'hex_code' => '#D4A574'],
            ['name' => 'Walnut',         'hex_code' => '#5C4033'],
            ['name' => 'Grey',           'hex_code' => '#808080'],
            ['name' => 'Beige',          'hex_code' => '#F5F5DC'],
            ['name' => 'Charcoal',       'hex_code' => '#36454F'],
            ['name' => 'Cream',          'hex_code' => '#FFFDD0'],
            ['name' => 'Navy',           'hex_code' => '#1B2A4A'],
            ['name' => 'Forest Green',   'hex_code' => '#2D5A27'],
            ['name' => 'Terracotta',     'hex_code' => '#C0604A'],
            ['name' => 'Sand',           'hex_code' => '#C2B280'],
            ['name' => 'Brown',          'hex_code' => '#7B4F2E'],
            ['name' => 'Dusty Rose',     'hex_code' => '#C2908A'],
        ]);
    }
}
