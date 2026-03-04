@extends('layouts.app')

@section('title', 'Add New Product - Cavelli Atelier')

@section('content')
<main class="flex min-h-screen">

    {{-- Sidebar --}}
    <section class="w-64 flex-shrink-0">
        <x-sidebar />
    </section>

    {{-- Main Content --}}
    <section class="flex-1">
            <form method="POST" action="{{ route('products.store') }}">
                @csrf

                {{-- Rubrik + knapp --}}
                <div class="flex m-10 mb-px justify-between items-center">
                    <h1>Add New Product</h1>
                    <button class="bg-[#8eb88e] hover:bg-[#7a9e7a] text-white px-4 py-2.5 rounded-full flex items-center gap-2 transition-colors" type="submit">
                        + Add new Product
                    </button>
                </div>

                <div class="flex flex-wrap gap-10 m-10">

                    {{-- LEFT COLUMN --}}
                    <div class="flex flex-col gap-10 flex-[3] min-w-80">


                        {{-- SECTION: Name and Description --}}
                        <x-form-section title="Name and Description">
                            <div class="flex flex-col gap-5">

                                {{-- product name --}}
                                <div>
                                    <label class="form-label" for="name">Product Name:</label>
                                    <input class="input-field" type="text" id="name" name="name" value="{{ old('name') }}">
                                    @error('name')
                                    <p>{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- description --}}
                                <div>
                                    <label class="form-label" for="description">Product Description:</label>
                                    <textarea class="input-field" id="description" name="description" rows="5">{{ old('description') }}</textarea>
                                </div>

                            </div>
                        </x-form-section>


                        {{-- SECTION: Product Details --}}
                        <x-form-section title="Product Details">
                            <div>

                                <fieldset>
                                    {{-- Properties --}}
                                    <legend class="form-label">Properties:</legend>
                                    <div class="flex flex-wrap gap-2">

                                        {{-- height --}}
                                        <div class="flex flex-col min-w-28 flex-1">
                                            <label class="whitespace-nowrap text-sm text-gray-500 mb-1" for="height">Height (mm):</label>
                                            <input class="border border-gray-200 rounded-lg px-3 py-2 bg-gray-50" type="number" id="height" name="height" value="{{ old('height') }}" placeholder="H:">
                                        </div>

                                        {{-- width --}}
                                        <div class="flex flex-col min-w-28 flex-1">
                                            <label class="whitespace-nowrap text-sm text-gray-500 mb-1" for="width">Width (mm):</label>
                                            <input class="border border-gray-200 rounded-lg px-3 py-2 bg-gray-50" type="number" id="width" name="width" value="{{ old('width') }}" placeholder="W:">
                                        </div>

                                        {{-- length --}}
                                        <div class="flex flex-col min-w-28 flex-1">
                                            <label class="whitespace-nowrap text-sm text-gray-500 mb-1" for="length">Length (mm):</label>
                                            <input class="border border-gray-200 rounded-lg px-3 py-2 bg-gray-50" type="number" id="length" name="length" value="{{ old('length') }}" placeholder="L:">
                                        </div>

                                        {{-- weight --}}
                                        <div class="flex flex-col min-w-28 flex-1">
                                            <label class="whitespace-nowrap text-sm text-gray-500 mb-1" for="weight">Weight (kg):</label>
                                            <input class="border border-gray-200 rounded-lg px-3 py-2 bg-gray-50" type="number" id="weight" name="weight" value="{{ old('weight') }}" placeholder="WT:">
                                        </div>
                                    </div>
                                </fieldset>

                                {{-- Materials multi-select --}}
                                <x-checkbox-dropdown label="Materials:" :items="$materials" name="materials" />

                                {{-- Colors multi-select --}}
                                <x-checkbox-dropdown label="Colors:" :items="$colors" name="colors" />
                            </div>
                        </x-form-section>

                    </div>

                    {{-- RIGHT COLUMN --}}
                    <div class="flex flex-col gap-10 flex-[2] min-w-64">

                        {{-- SECTION: Category --}}
                        <x-form-section title="Category">
                            <div>

                                <div>
                                    <label class="form-label" for="category_id">Product Category:</label>
                                    <select id="category_id" name="category_id">
                                        <option value="">-- Select category --</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="form-label" for="product_type_id">Product Sub-Category:</label>
                                    <select id="product_type_id" name="product_type_id">
                                        <option value="">-- Select type --</option>
                                        @foreach ($productTypes as $type)
                                        <option value="{{ $type->id }}"
                                            {{ old('product_type_id') == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('product_type_id')
                                    <p>{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </x-form-section>


                        {{-- SECTION: Pricing --}}
                        <x-form-section title="Pricing">
                            <div class="flex gap-4">

                                <div>
                                    <label class="form-label" for="price">Price (kr)</label>
                                    <input class="input-field" type="number" id="price" name="price" step="0.01" value="{{ old('price') }}">
                                    @error('price')
                                    <p>{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="form-label" for="discount">Discount</label>
                                    <input class="input-field" type="number" id="discount" name="discount">
                                </div>

                            </div>
                        </x-form-section>


                        {{-- SECTION: Upload Images --}}
                        <x-form-section title="Upload Images">
                            <div>
                                <div>img placeholder</div>
                                <div>img placeholder</div>
                                <div>img placeholder</div>
                            </div>
                        </x-form-section>

                    </div>
                </div>
            </form>
    </section>
</main>

@endsection