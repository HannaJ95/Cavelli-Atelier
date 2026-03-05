<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Color::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'LIKE', "%{$search}%");
        }

        if ($request->filled('sort')) {
            $direction = $request->sort === 'name_asc' ? 'asc' : 'desc';
            $query->orderBy('name', $direction);
        } else {
            $query->orderBy('name', 'asc');
        }

        $colors = $query->paginate(12)->withQueryString();

        return view('attributes.colors.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('attributes.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:10|unique:colors',
            'hex_code' => 'required|string|regex:/^#[0-9A-F]{6}$/i|unique:colors',
        ]);

        Color::create($validated);

        return redirect()->route('colors.index')->with('success', 'Color added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        return view('attributes.colors.show', compact('color'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return view('attributes.colors.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:10|unique:colors,name,' . $color->id,
            'hex_code' => 'required|string|regex:/^#[0-9A-F]{6}$/i|unique:colors,hex_code,' . $color->id,
        ]);

        $color->update($validated);

        return redirect()->route('colors.index')->with('success', 'Color updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        $color->delete();

        return redirect()->route('colors.index')->with('success', 'Color deleted successfully!');
    }
}
