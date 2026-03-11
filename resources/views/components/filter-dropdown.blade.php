{{-- resources/views/components/filter-dropdown.blade.php --}}

@props([
    'name', 
    'ariaLabel' => '',
    'options' => [], 
    'label' => null,           {{-- Visible label (Optional) --}}
    'prefix' => 'Show',        {{-- "Show" or "Sort" --}}
    'defaultLabel' => 'All'    {{-- e.g., "All products" or "Default" --}}
])

<div class="flex flex-col gap-2">
    @if($label)
        <label class="font-bold text-gray-800 text-sm ml-4">{{ $label }}</label>
    @endif

    <div class="relative inline-block shrink-0">
        <select 
            name="{{ $name }}" 
            class="appearance-none bg-gray-200 rounded-full py-2.5 pl-4 pr-12 text-gray-600 text-sm font-medium cursor-pointer"
            aria-label="{{ $ariaLabel }}">
    
            <option value="">{{ $prefix }}: {{ $defaultLabel }}</option>
    
            @foreach($options as $value => $display)
                <option value="{{ $value }}" {{ request($name) == (string)$value ? 'selected' : '' }}>
                    {{ $prefix }}: {{ $display }}
                </option>
            @endforeach
        </select>
    
        <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-700">
            <i class="fa fa-chevron-down text-sm" aria-hidden="true"></i>
        </div>
    </div>
</div>