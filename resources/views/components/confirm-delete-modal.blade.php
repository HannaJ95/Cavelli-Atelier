@props(['item', 'table', 'action', 'modalId' => 'confirm-delete-modal', 'productCount' => 0])

<dialog id="{{ $modalId }}"
    aria-labelledby="{{ $modalId }}-title"
    aria-modal="true"
    class="rounded-2xl shadow-xl p-8 w-full max-w-md backdrop:bg-black/50 fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
    <h2 id="{{ $modalId }}-title" class="text-lg font-semibold mb-2">
        <i class="fa fa-light fa-triangle-exclamation text-red-500 text-xl"></i>
        Delete {{ $item }}?</h2>

    @if ($productCount > 0)
        <p class="text-sm text-red-600 bg-red-50 border border-red-200 rounded-lg px-4 py-3 mb-4">
            <strong>Cannot delete</strong> — <span class="font-medium text-gray-800">{{ $item }}</span> is linked to {{ $productCount }} {{ $productCount === 1 ? 'product' : 'products' }}.
        </p>
    @else
        <p class="text-sm text-gray-500 mb-6">Are you sure you want to delete <span class="font-medium text-gray-800">{{ $item }}</span> from {{ $table }}? This action cannot be undone.</p>
    @endif

    <div class="flex justify-end gap-3">
        <button type="button"
            onclick="document.getElementById('{{ $modalId }}').close()"
            class="px-4 py-2 rounded-full border border-gray-300 text-gray-600 hover:bg-gray-100 transition-colors">
            {{ $productCount > 0 ? 'Close' : 'Cancel' }}
        </button>
        @if ($productCount === 0)
            <form method="POST" action="{{ $action }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 rounded-full bg-red-500 hover:bg-red-600 text-white transition-colors">
                    Yes, delete
                </button>
            </form>
        @endif
    </div>
</dialog>
