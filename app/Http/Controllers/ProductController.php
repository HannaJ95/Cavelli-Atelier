<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\Color;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index(Request $request)
    {
        $products = Product::paginate(12);
        $types = ProductType::all();
        $materials = Color::all();

        return view('products', [
            'products' => $products,
            'types' => $types,
            'materials' => $materials,
        ]);
    }
}
