@extends('layouts.app')

@section('title', 'Materials - Cavelli Atelier')

@section('content')
    <main class="flex min-h-screen">
        <section class="flex-1 bg-gray-50 overflow-auto">

            {{-- breadcrumbs --}}
            <x-breadcrumbs :links="[
                ['label' => 'Overview', 'url' => route('dashboard')],
                ['label' => 'Materials', 'url' => route('materials.index')],
            ]" />

            <div class="p-10">
                @include('errors')
            
                <div class="bg-gray-100 border border-gray-300 shadow-sm rounded-2xl p-10 pb-4 mb-6">
                    <h1 class="font-semibold text-lg p-4">Materials</h1>
                    <div class="flex items-center gap-4 mb-6">
                        <a href="" role="button" aria-label="Add a new material"
                            class="btn-primary">
                            <span class="text-xl">+</span> Add new material
                        </a>
                    </div>

                    <form method="get" action="{{ route('materials.index' )}}">
                        <div class="flex items-center gap-4">
                            <div class="relative grow">
                                <span class="pointer-events-none absolute inset-y-0 left-4 flex items-center text-gray-400">
                                    <i class="fa fa-search"></i>
                                </span>
                                <input type="text" name="search" placeholder="Search materials..." maxlength="50"
                                class="w-full bg-gray-200 border-none rounded-full py-2.5 pl-11 pr-12 text-sm font-medium focus:ring-2 focus:ring-[#8eb88e]" />
                            </div>

                            <div class="relative inline-block">
                                <select name="sort" class="appearance-none bg-gray-200 border-none rounded-full py-2.5 pl-6 pr-12 text-gray-600 text-sm font-medium cursor-pointer focus:ring-2 focus:ring-[#8eb88e]">
                                    <option value="name_asc">Name: A-Z</option>
                                    <option value="name_desc">Name: Z-A</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-700">
                                    <i class="fa fa-chevron-down text-sm" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <x-card-grid
                    :items="$materials"
                    mode="material"
                    :columns="3"
                    :columns2="2"
                />

            </div>
        </section>
    </main>
@endsection
