@props(['label', 'items', 'name'])

<fieldset>
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
                           {{ in_array($item->id, old($name, [])) ? 'checked' : '' }}>
                    {{ $item->name }}
                </label>
            @endforeach
        </div>
    </details>
</fieldset>
