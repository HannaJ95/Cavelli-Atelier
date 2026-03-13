@props([
    'items'    => [],
    'mode'     => 'material',
    'columns'  => 2,
    'columns2' => 2,
])

@php
    $gridCols = match((int) $columns) {
        1       => 'xl:grid-cols-1',
        3       => 'xl:grid-cols-3',
        default => 'xl:grid-cols-2',
    };

    $routeName = \Illuminate\Support\Str::plural($mode) . '.destroy';
@endphp

<div role="region" aria-label="{{ ucfirst($mode) }} list">
    <div class="grid grid-cols-1 {{ $gridCols }} gap-4 lg:gap-6">

        @forelse ($items as $item)
            <article class="relative flex items-start bg-gray-100 border border-gray-300 rounded-2xl shadow-sm
                        p-3 lg:p-6
                        gap-3 lg:gap-6
                        min-w-0">

                {{-- Thumbnail --}}
                @if ($mode === 'color')
                    <div class="w-10 h-10 lg:w-16 lg:h-16 shrink-0 rounded-xl border border-gray-200 shadow-inner"
                         style="background-color: {{ $item->hex_code }};"
                         aria-label="Color preview: {{ $item->name }}"></div>
                @else
                    <div class="w-10 h-10 lg:w-16 lg:h-16 shrink-0 rounded-xl border border-gray-200 shadow-inner bg-gray-300"
                         aria-label="Material preview"></div>
                @endif

                <div class="h-8 lg:h-12 border-l border-gray-200 shrink-0" aria-hidden="true"></div>

                {{-- Single flex row — everything in one line --}}
                <div class="flex flex-row items-start flex-1 min-w-0 gap-4 lg:gap-8">

                    {{-- Name --}}
                    <div class="min-w-0 overflow-hidden">
                        <p class="uppercase-text">
                            {{ $mode === 'color' ? 'Color Name' : 'Material Name' }}
                        </p>
                        <h3 class="font-bold text-gray-900 text-sm lg:text-lg truncate">{{ $item->name }}</h3>
                    </div>

                    {{-- Hex code (color mode only) --}}
                    @if ($mode === 'color')
                        <div class="min-w-0 overflow-hidden">
                            <p class="uppercase-text">Hex Code</p>
                            <p class="font-bold text-gray-500 text-sm lg:text-lg t-0">{{ $item->hex_code }}</p>
                        </div>
                    @endif

                    {{-- Actions pushed to the far right --}}
                    <div class="flex items-start gap-2 lg:gap-4 ml-auto shrink-0">
                            <button type="button"
                                    onclick="document.getElementById('confirm-delete-modal-{{ $item->id }}').showModal()"
                                    class="text-gray-400 hover:text-red-600 transition-colors cursor-pointer text-center"
                                    aria-label="Delete {{ $mode }}: {{ $item->name }}">
                                <p class="uppercase-text">Delete</p>
                                <i class="fa fa-trash text-xl lg:text-3xl" aria-hidden="true"></i>
                            </button>
                            <x-confirm-delete-modal
                                item="{{ $item->name }}"
                                table="{{ $mode }}s"
                                action="{{ route($routeName, $item->id) }}"
                                modalId="confirm-delete-modal-{{ $item->id }}"
                                :productCount="$item->products_count ?? 0"
                            />
                    </div>

                </div>
            </article>

        @empty
            <div class="text-center p-20 bg-gray-100 rounded-2xl border border-gray-200 col-span-full">
                <p class="text-gray-500 italic">No {{ $mode }}s found. Change your search or add a new one!</p>
            </div>
        @endforelse

    </div>
</div>