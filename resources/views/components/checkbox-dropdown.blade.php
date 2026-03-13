@props([
    'name', 
    'label' => null, 
    'items' => [], 
    'selected' => [],
    'placeholder' => 'Select items'
])

<fieldset class="flex flex-col gap-2">
    @if($label)
        <legend class="form-label">{{ $label }}</legend>
    @endif

    <details class="relative w-full group checkbox-dropdown">
        <summary class="list-none appearance-none bg-gray-200 rounded-full py-2.5 pl-4 pr-12 text-gray-600 text-sm font-medium cursor-pointer w-full flex justify-between items-center focus:outline-none focus:ring-2 focus:ring-brand focus:ring-offset-1">
            
        <span>{{ $placeholder }}</span>

            <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-700">
                <i class="fa fa-chevron-down text-sm" aria-hidden="true"></i>
            </div>
        </summary>

        <div class="absolute mt-1 w-full bg-gray-200 rounded-md shadow-lg z-10 p-4 max-h-60 overflow-auto">
            @foreach ($items as $id => $name_item)
                <label class="flex items-center gap-3 px-3 py-2 hover:bg-white rounded-lg cursor-pointer transition-colors">
                    <input
                        type="checkbox" 
                        name="{{ $name }}[]"
                        value="{{ $id }}"
                        @checked(in_array($id, $selected))
                        class="w-4 h-4 rounded border-gray-300 accent-primary focus:ring-brand">
                    <span class="text-sm text-gray-700">{{ $name_item }}</span>
                </label>
            @endforeach
        </div>
    </details>
</fieldset>

<script>
    if (!window.__cbDropdownInit) {
        window.__cbDropdownInit = true;
        document.addEventListener('click', function (e) {
            document.querySelectorAll('details.checkbox-dropdown[open]').forEach(function (details) {
                if (!details.contains(e.target)) {
                    details.removeAttribute('open');
                }
            });
        });
    }
</script>