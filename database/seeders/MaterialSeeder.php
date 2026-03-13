<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Material;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materials = [
            'Oak', 'Walnut', 'Pine', 'Steel', 'Glass',
            'Velvet', 'Linen', 'Leather', 'Rattan', 'Marble',
            'Brass', 'Concrete', 'Wool', 'Ceramic',
        ];

        foreach ($materials as $name) {
            Material::create(['name' => $name]);
        }
    }
}
