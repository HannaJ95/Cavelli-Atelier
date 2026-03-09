@props(['item', 'table', 'action'])

<div>
<dialog id="confirm-delete-modal" class="rounded-2xl shadow-xl p-8 w-full max-w-md backdrop:bg-black/50 fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
    <h2 class="text-lg font-semibold mb-2">Delete {{ $item }}?</h2>
    <p class="text-sm text-gray-500 mb-6">Are you sure you want to delete <span class="font-medium text-gray-800">{{ $item }}</span> from {{ $table }}? This action cannot be undone.</p>
    <div class="flex justify-end gap-3">
        <button type="button"
            onclick="document.getElementById('confirm-delete-modal').close()"
            class="px-4 py-2 rounded-full border border-gray-300 text-gray-600 hover:bg-gray-100 transition-colors">
            Cancel
        </button>
        <form method="POST" action="{{ $action }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 rounded-full bg-red-500 hover:bg-red-600 text-white transition-colors">
                Yes, delete
            </button>
        </form>
    </div>
</dialog>