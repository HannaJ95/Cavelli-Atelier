<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SeedController extends Controller
{
    public function seed()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('color_product')->truncate();
        DB::table('material_product')->truncate();
        DB::table('products')->truncate();
        DB::table('product_types')->truncate();
        DB::table('categories')->truncate();
        DB::table('colors')->truncate();
        DB::table('materials')->truncate();
        Schema::enableForeignKeyConstraints();

        Artisan::call('db:seed', ['--class' => 'SeedSeeder']);

        return redirect()->route('products.index')->with('success', 'Database re-seeded!');
    }
}