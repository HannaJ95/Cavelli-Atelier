{{-- resources/views/components/filter-dropdown.blade.php --}}

@props([
    'name', 
    'ariaLabel' => '', 
    'options' => [], 
    'label' => null,           
    'prefix' => null,          {{-- Ensure this is null! --}}
    'defaultLabel' => 'All',
    'selected' => null         
])

<div class="flex flex-col gap-2">
    @if($label)
        <label class="font-bold text-gray-800 text-sm ml-4">{{ $label }}</label>
    @endif

    <div class="relative w-full group">
        <select 
            name="{{ $name }}"
            class="list-none appearance-none bg-gray-200 rounded-full py-2.5 pl-4 pr-12 text-gray-600 text-sm font-medium cursor-pointer w-full flex justify-between items-center focus:outline-none"
            aria-label="{{ $ariaLabel }}">
    
            <option value="">
                {{ $prefix ? $prefix . ': ' : '' }}{{ $defaultLabel }}
            </option>
    
            @foreach($options as $value => $display)
                <option class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-brand"
                    value="{{ $value }}" 
                    {{ (old($name) == $value || $selected == $value) ? 'selected' : '' }}>
                    {{ $prefix ? $prefix . ': ' : '' }}{{ $display }}
                </option>
            @endforeach
        </select>
    
        <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-700">
            <i class="fa fa-chevron-down text-sm" aria-hidden="true"></i>
        </div>
    </div>
</div>