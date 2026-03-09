@props([
    'items'    => [],
    'mode'     => 'material',
    'columns'  => 2,
    'columns2' => 2,
])

@php
    $gridCols = match((int) $columns) {
        1       => 'lg:grid-cols-1',
        3       => 'lg:grid-cols-3',
        default => 'lg:grid-cols-2',
    };

    $routeName = \Illuminate\Support\Str::plural($mode) . '.destroy';
@endphp

<div>
    <div class="grid grid-cols-1 {{ $gridCols }} gap-4 lg:gap-6">

        @forelse ($items as $item)
            <div class="relative flex items-start bg-gray-100 border border-gray-300 rounded-lg shadow-sm
                        p-3 lg:p-6
                        gap-3 lg:gap-6
                        min-w-0">

                {{-- Thumbnail --}}
                @if ($mode === 'color')
                    <div class="w-10 h-10 lg:w-16 lg:h-16 shrink-0 rounded-xl border border-gray-100 shadow-inner"
                         style="background-color: {{ $item->hex_code }};"></div>
                @else
                    <div class="w-10 h-10 lg:w-16 lg:h-16 shrink-0 rounded-xl border border-gray-100 shadow-inner bg-gray-300"></div>
                @endif

                <div class="h-8 lg:h-12 border-l border-gray-100 shrink-0"></div>

                {{-- Single flex row — everything in one line --}}
                <div class="flex flex-row items-start flex-1 min-w-0 gap-4 lg:gap-8">

                    {{-- Name --}}
                    <div class="min-w-0 shrink-0">
                        <p class="text-[8px] lg:text-[10px] text-gray-400 uppercase font-black tracking-widest mb-1">
                            {{ $mode === 'color' ? 'Color Name' : 'Material Name' }}
                        </p>
                        <h1 class="font-bold text-gray-800 text-sm lg:text-lg truncate">{{ $item->name }}</h1>
                    </div>

                    {{-- Hex code (color mode only) --}}
                    @if ($mode === 'color')
                        <div class="min-w-0 shrink-0">
                            <p class="text-[8px] lg:text-[10px] text-gray-400 uppercase font-black tracking-widest mb-1">Hex Code</p>
                            <p class="font-bold text-gray-500 text-sm lg:text-lg t-0">{{ $item->hex_code }}</p>
                        </div>
                    @endif

                    {{-- Actions pushed to the far right --}}
                    <div class="flex items-start gap-2 lg:gap-4 ml-auto shrink-0">
                        <button type="button" class="text-gray-400 hover:text-[#8eb88e] transition-colors cursor-pointer text-center">
                            <p class="text-[8px] lg:text-[10px] text-gray-400 uppercase font-black tracking-widest mb-1">Edit</p>
                            <i class="fa fa-edit text-xl lg:text-3xl"></i>
                        </button>
                        <form action="{{ route($routeName, $item['id']) }}" method="POST"
                              onsubmit="return confirm('Delete this {{ $mode }}?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-gray-400 hover:text-red-500 transition-colors cursor-pointer text-center">
                                <p class="text-[8px] lg:text-[10px] text-gray-400 uppercase font-black tracking-widest mb-1">Delete</p>
                                <i class="fa fa-trash text-xl lg:text-3xl"></i>
                            </button>
                        </form>
                    </div>

                </div>
            </div>

        @empty
            <div class="text-center p-20 bg-white rounded-2xl border border-gray-200 col-span-full">
                <p class="text-gray-500 italic">No {{ $mode }}s found. Start by adding a new one!</p>
            </div>
        @endforelse

    </div>
</div>