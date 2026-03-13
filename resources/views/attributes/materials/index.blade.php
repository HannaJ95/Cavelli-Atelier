@extends('layouts.app')

@section('title', 'Materials - Cavelli Atelier')

@section('content')
    <main id="main-content" class="flex-1 bg-gray-50 overflow-auto">

        {{-- Breadcrumbs --}}
        <x-breadcrumbs :links="[
            ['label' => 'Overview', 'url' => route('dashboard')],
            ['label' => 'Materials', 'url' => route('materials.index')],
        ]" />

        <div class="bg-gray-100 border border-gray-300 shadow-sm rounded-2xl p-6 lg:p-10 m-4 lg:m-10 mb-px">
            <form method="GET" action="{{ route('materials.index') }}" aria-label="Filter materials">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="intro-h1">Materials</h1>
                    <a href="" aria-label="Add a new material" class="btn-primary">
                        <span class="text-xl leading-none">+</span> Add new material
                    </a>
                </div>

                <hr class="border-gray-300 -mx-6 mb-6" aria-hidden="true">

                <div class="flex flex-wrap items-center gap-3 lg:gap-4 mb-6">
                    <div class="relative grow min-w-40">
                        <span class="pointer-events-none absolute inset-y-0 left-4 flex items-center text-gray-400">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </span>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search materials..." maxlength="50"
                            aria-label="Search materials by name"
                            aria-describedby="search-error"
                            class="w-full bg-gray-200 rounded-full py-2.5 pl-11 pr-12 text-sm font-medium
                                   {{ $errors->has('search') ? 'ring-2 ring-red-500' : '' }}" />

                        @error('search')
                            <p id="search-error" role="alert" class="absolute -bottom-5 left-4 text-xs text-red-600 font-medium whitespace-nowrap">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- <div class="relative inline-block shrink-0">
                        <select name="sort" class="appearance-none bg-gray-200 rounded-full py-2.5 pl-6 pr-12 text-gray-600 text-sm font-medium cursor-pointer focus:ring-2 focus:ring-brand"
                            aria-label="Sort materials by name">
                            <option value="name_asc"  {{ request('sort') == 'name_asc'  ? 'selected' : '' }}>Name: A-Z</option>
                            <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name: Z-A</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-700">
                            <i class="fa fa-chevron-down text-sm" aria-hidden="true"></i>
                        </div>
                    </div>

                    <button type="submit" aria-label="Apply filters" class="btn-primary">
                        Apply Filters
                    </button> --}}

                    <a href="{{ route('materials.index') }}" aria-label="Reset filters"
                        class="shrink-0 text-sm text-gray-500 hover:text-gray-700 underline self-center">
                        Reset
                    </a>
                </div>
            </form>
        </div>

        {{-- Materials list --}}
        <div class="p-4 lg:p-10">
            <x-card-grid
                :items="$materials"
                mode="material"
                :columns="2"
                :columns2="2"
            />
        </div>

    </main>
@endsection