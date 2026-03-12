{{-- @props(['label', 'items', 'name', 'selected' => []]) --}}
@props([
    'name', 
    'label' => null, 
    'items' => [], 
    'selected' => [],
    'placeholder' => 'Select items'
])

{{-- <fieldset>
    <legend class="form-label">{{ $label }}</legend>
    <details>
        <summary>
            Select {{ strtolower($label) }}...
        </summary>
        <div>
            @foreach ($items as $item)
                <label>
                    <input type="checkbox"
                           name="{{ $name }}[]"
                           value="{{ $item->id }}"
                           {{ in_array($item->id, old($name, $selected)) ? 'checked' : '' }}>
                    {{ $item->name }}
                </label>
            @endforeach
        </div>
    </details>
</fieldset> --}}

<div class="flex flex-col gap-2">
    @if($label)
        <label class="font-bold text-gray-800 text-sm ml-4">{{ $label }}</label>
    @endif

    <details class="relative w-full group">
        <summary class="list-none appearance-none bg-gray-200 rounded-full py-2.5 pl-4 pr-12 text-gray-600 text-sm font-medium cursor-pointer w-full flex justify-between items-center focus:outline-none">
            <span>
                @if(count($selected) > 0)
                    {{-- This version handles both keyed arrays and object collections --}}
                    {{ collect($items)->filter(fn($item, $key) => in_array($key, $selected))->implode(', ') }}
                @else
                    {{ $placeholder }}
                @endif
            </span>

            <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-700">
                <i class="fa fa-chevron-down text-sm" aria-hidden="true"></i>
            </div>
        </summary>

        <div class="absolute mt-1 w-full bg-gray-200 rounded-md shadow-lg z-10 p-4 max-h-60 overflow-auto">
            @foreach ($items as $id => $name_item)
                <label class="items-center gap-3 px-3 py-2 hover:bg-white rounded-lg cursor-pointer transition-colors">
                    <input
                        type="checkbox" 
                        name="{{ $name }}[]" 
                        value="{{ $id }}"
                        @checked(in_array($id, $selected))
                        class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-brand">
                    <span class="text-sm text-gray-700">{{ $name_item }}</span>
                </label>
            @endforeach
        </div>
    </details>
</div>