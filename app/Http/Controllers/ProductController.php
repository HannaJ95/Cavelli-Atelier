<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Material;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index(Request $request)
    {

        $query = Product::with('materials', 'colors', 'productType');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        if ($request->filled('type')) {
            $query->where('product_type_id', $request->type);
        }

        if ($request->filled('material')) {
            $query->whereHas('materials', function ($q) use ($request) {
                $q->where('materials.id', $request->material);
            });
        }

        if ($request->filled('price')) {
            $direction = $request->price === 'low' ? 'asc' : 'desc';
            $query->orderBy('price', $direction);
        }

        if ($request->filled('sort')) {
            $direction = $request->sort === 'newest' ? 'desc' : 'asc';
            $query->orderBy('created_at', $direction);
        }

        $products = $query->paginate(12)->withQueryString();
        $types = ProductType::all();
        $materials = Material::all();

        return view('products', [
            'products' => $products,
            'types' => $types,
            'materials' => $materials,
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        $productTypes = ProductType::all();
        $colors = Color::all();
        $materials = Material::all();

        return view('products.create', compact('categories', 'productTypes', 'colors', 'materials'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255|unique:products',
            'description'     => 'nullable|string',
            'product_type_id' => 'required|exists:product_types,id',
            'price'           => 'required|numeric|min:0.01|max:99999999.99',
            'height'          => 'nullable|integer|min:0|max:100000',
            'width'           => 'nullable|integer|min:0|max:100000',
            'length'          => 'nullable|integer|min:0|max:100000',
            'weight'          => 'nullable|numeric|min:0|max:999999.99',
        ]);

        $product = Product::create($validated);

        $product->colors()->sync($request->input('colors', []));
        $product->materials()->sync($request->input('materials', []));

        return redirect()->route('products.index')->with('success', 'Product added!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $productTypes = ProductType::all();
        $colors = Color::all();
        $materials = Material::all();

        return view('products.edit', compact('product', 'categories', 'productTypes', 'colors', 'materials'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255|unique:products,name,' . $product->id,
            'description'     => 'nullable|string',
            'product_type_id' => 'required|exists:product_types,id',
            'price'           => 'required|numeric|min:0.01|max:99999999.99',
            'height'          => 'nullable|integer|min:0|max:100000',
            'width'           => 'nullable|integer|min:0|max:100000',
            'length'          => 'nullable|integer|min:0|max:100000',
            'weight'          => 'nullable|numeric|min:0|max:999999.99',
        ]);

        $product->update($validated);
        $product->colors()->sync($request->input('colors', []));
        $product->materials()->sync($request->input('materials', []));

        return redirect()->route('products.index')->with('success', 'Product updated!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted!');
    }
}
