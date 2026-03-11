@props(['field'])

@error($field)
    <p id="{{ $field }}-error" class="text-red-600 text-sm mt-1" role="alert">{{ $message }}</p>
@enderror