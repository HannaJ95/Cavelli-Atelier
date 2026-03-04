<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::paginate(12);

        return view('attributes.materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('attributes.materials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:10|unique:materials',
        ]);

        Material::create($validated);

        return redirect()->route('materials.index')->with('success', 'Material added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        return view('attributes.materials.show', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        return view('attributes.materials.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:10|unique:materials,name,' . $material->id,
        ]);

        $material->update($validated);

        return redirect()->route('materials.index')->with('success', 'Material updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        $material->delete();

        return redirect()->route('materials.index')->with('success', 'Material deleted successfully!');
    }
}
