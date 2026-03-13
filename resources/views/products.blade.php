@extends('layouts.app')

@section('title', 'Products - Cavelli Atelier')

@section('content')
    <main id="main-content" class="flex-1 bg-gray-50 overflow-auto">
        {{-- breadcrumbs --}}
        <x-breadcrumbs :links="[
            ['label' => 'Overview', 'url' => route('dashboard')],
            ['label' => $editMode ? 'Edit products' : 'Products', 'url' => $editMode ? route('products.index') : route('products.edit-mode')]
        ]" />

        <div class="bg-gray-100 border border-gray-300 shadow-sm rounded-2xl p-6 lg:p-10 m-4 lg:m-10 mb-px">
            <form method="GET" action="{{ route('products.index') }}" aria-label="Filter products">
                <h1 class="intro-h1">
                    {{ $editMode ? 'Edit' : 'Products' }}
                </h1>

                {{-- Top bar: search, status, sort, add button --}}
                <div class="flex flex-wrap items-center gap-3 lg:gap-4 mb-6">
                    <div class="relative grow min-w-40">
                        <span class="pointer-events-none absolute inset-y-0 left-4 flex items-center text-gray-400">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </span>
                        <input type="text" name="search" value="{{ request('search') }}" 
                            placeholder="Search product..." maxlength="50" 
                            aria-label="Search products by name"
                            aria-describedby="search-error"
                            class="w-full bg-gray-200 rounded-full py-2.5 pl-11 pr-12 text-sm font-medium
                                {{ $errors->has('search') ? 'ring-2 ring-red-500' : '' }}" />

                        {{-- Error message --}}
                        @error('search')
                        <p id="search-error" role="alert" class="absolute -bottom-5 left-4 text-xs text-red-600 font-medium whitespace-nowrap">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <!-- <x-filter-dropdown 
                        name="status"
                        ariaLabel="Filter products by status"
                        defaultLabel="Show: All products"
                        :options="[
                            'active' => 'Show: Active only',
                            'inactive' => 'Show: Inactive only',
                            
                        ]" /> -->


                    <x-filter-dropdown 
                        name="sort"
                        ariaLabel="Sort products by date"
                        defaultLabel="Sort by: Default"
                        :options="[
                            'newest' => 'Sort by: Newest',
                            'oldest' => 'Sort by: Oldest',
                        ]" 
                    />


                    <a href="{{ route('products.create') }}"
                        aria-label="Add a new product"
                        class="btn-primary">
                        <span class="text-xl leading-none">+</span> Add new product
                    </a>
                </div>

                <hr class="border-gray-300 -mx-6 mb-6" aria-hidden="true">

                {{-- Filter row: wraps to new lines at 200% zoom --}}
                <div class="flex flex-wrap gap-4 lg:gap-6 items-end" aria-label="Additional product filters: type, price, material">
                  
                    <x-filter-dropdown 
                        name="type"
                        label="Product type"
                        aria-label="Filter products by type"
                        defaultLabel="All types"
                        prefix="Show"
                        :options="$types->pluck('name', 'id')" 
                    />


                    <x-filter-dropdown 
                        name="price"
                        label="Price"
                        aria-label="Sort products by price"
                        defaultLabel="Default"
                        prefix="Sort"
                        :options="[
                            'low' => 'Low to High',
                            'high' => 'High to Low',
                        ]" 
                    />

                    {{-- <div class="flex flex-col gap-2">
                        <label class="font-bold text-gray-800 text-sm ml-4">Material</label>
                        <div class="relative">
                            <select name="material" class="appearance-none bg-gray-200 rounded-full py-2.5 pl-4 pr-12 text-gray-600 text-sm font-medium cursor-pointer"
                            aria-label="Filter products by material">
                                <option value="">Show by: All</option>
                                @foreach ($materials as $material)
                                    <option value="{{ $material->id }}" {{ request('material') == $material->id ? 'selected' : '' }}>
                                        Show by: {{ $material->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-700">
                                <i class="fa fa-chevron-down text-sm"></i>
                            </div>
                        </div>
                    </div> --}}
                    <x-filter-dropdown 
                        name="material"
                        label="Material"
                        aria-label="Filter products by material"
                        defaultLabel="All"
                        prefix="Show by"
                        :options="$materials->pluck('name', 'id')" 
                    />
                    <button type="submit" aria-label="Apply filters"
                        class="btn-primary">
                        Apply Filters
                    </button>
                    <a href="{{ route('products.index') }}" aria-label="Reset filters"
                        class="shrink-0 text-sm text-gray-500 hover:text-gray-700 underline self-center">
                        Reset
                    </a>
                </div>
            </form>
        </div>

        {{-- Products list --}}
        <div class="p-4 lg:p-10" aria-label="List of products matching the selected filters">
            @forelse ($products as $product)
                <x-product-card :product="$product" :editMode="$editMode" />
            @empty
                <div class="text-center p-20 bg-white rounded-2xl border border-gray-200">
                    <p class="text-gray-500 italic">No furniture matches your search. Try adjusting the filters!</p>
                </div>
            @endforelse

            <nav aria-label="Pagination" class="mt-8 p-4 bg-white rounded-xl shadow-sm border border-gray-200">
                {{ $products->links() }}
            </nav>
        </div>
    </main>
@endsection