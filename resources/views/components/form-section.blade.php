@props(['title'])

<fieldset class="bg-gray-100 border border-gray-300 shadow-sm rounded-2xl px-5 pb-5 pt-5 flex-1">
    <legend class="sr-only">{{ $title }}</legend>
    <h2 class="text-lg mb-3">{{ $title }}</h2>
    <hr class="-mx-5 border-gray-300 mb-4">
    {{ $slot }}
</fieldset>
