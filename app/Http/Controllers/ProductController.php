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
        $products = Product::with('materials', 'colors', 'productType')->paginate(12);
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
            'price'           => 'required|numeric|min:0',
            'height'          => 'nullable|numeric',
            'width'           => 'nullable|numeric',
            'length'          => 'nullable|numeric',
            'weight'          => 'nullable|numeric',
        ]);


        $product = Product::create([
            'name'            => $validated['name'],
            'description'     => $validated['description'],
            'product_type_id' => $validated['product_type_id'],
            'price'           => $validated['price'],
            'height'          => $validated['height'],
            'width'          => $validated['width'],
            'length'          => $validated['length'],
            'weight'          => $validated['weight'],
        ]);

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
            'price'           => 'required|numeric|min:0',
            'height'          => 'nullable|numeric',
            'width'           => 'nullable|numeric',
            'length'          => 'nullable|numeric',
            'weight'          => 'nullable|numeric',
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
