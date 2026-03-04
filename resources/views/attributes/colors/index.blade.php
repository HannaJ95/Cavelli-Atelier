@extends('layouts.app')

@section('title', 'Colors - Cavelli Atelier')

@section('content')
    <main class="flex min-h-screen">
        <!-- Sidebar -->
        <section class="w-64 flex-shrink-0">
            <x-sidebar />
        </section>

        <!-- Main Content -->
        <section class="flex-1 bg-gray-50 overflow-auto">
            <div class="p-10">
                @include('errors')
            
                <div class="bg-gray-100 border border-gray-300 shadow-sm rounded-lg p-10 pb-4 mb-6">
                    <h1 class="font-semibold text-lg p-4">Colors</h1>
                    <div class="flex items-center gap-4 mb-6">
                        <a href="" 
                            class="bg-[#8eb88e] hover:bg-[#7a9e7a] text-white px-4 py-2.5 rounded-full flex items-center gap-2 transition-colors">
                            <span class="text-xl">+</span> Add new color
                        </a>
                    </div>

                    <form method="get" action="{{ route('colors.index' )}}">
                        <div class="flex items-center gap-4">
                            <div class="relative grow">
                                <span class="pointer-events-none absolute inset-y-0 left-4 flex items-center text-gray-400">
                                    <i class="fa fa-search"></i>
                                </span>
                                <input type="text" name="search" placeholder="Search colors..." 
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

                <div class="px-10 py-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        @forelse ($colors as $color)
                            <div class="relative flex items-center bg-gray-100 border border-gray-200 rounded-2xl shadow-sm mb-4 p-6 gap-6">
                                <div class="w-16 h-16 rounded-xl border border-gray-100 shadow-inner" 
                                    style="background-color: {{ $color->hex_code ?? '#eee' }}">
                                </div>

                                <div class="h-12 border-l border-gray-100"></div>

                                <div class="grid grid-cols-3 flex-grow gap-8">
                                    <div>
                                        <p class="text-[10px] text-gray-400 uppercase font-black tracking-widest mb-1">Color Name</p>
                                        <h1 class="font-bold text-gray-800 text-lg">{{ $color->name }}</h1>
                                    </div>
                                    <div>
                                        <p class="text-[10px] text-gray-400 uppercase font-black tracking-widest mb-1">Hex Code</p>
                                        <p class="text-gray-500 font-mono">{{ $color->hex_code }}</p>
                                    </div>
                                    <div class="flex items-center justify-end gap-4">
                                        <a href="" class="text-gray-400 hover:text-[#8eb88e] transition-colors">
                                            <i class="fa fa-edit text-xl"></i>
                                        </a>
                                        <form action="{{ route('colors.destroy', $color->id) }}" method="POST" onsubmit="return confirm('Delete this color?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-gray-400 hover:text-red-500 transition-colors cursor-pointer">
                                                <i class="fa fa-trash text-xl"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center p-20 bg-white rounded-2xl border border-gray-200">
                                <p class="text-gray-500 italic">No colors found. Start by adding a new one!</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-6">
                        {{ $colors->links() }}
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
