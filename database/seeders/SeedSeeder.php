<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            ProductTypeSeeder::class,
            ColorSeeder::class,
            MaterialSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
