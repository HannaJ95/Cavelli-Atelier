@if (session('success'))
@php $deleted = session('toast_type') === 'deleted'; @endphp
<div id="toast"
    class="fixed bottom-6 right-6 z-50 flex items-center gap-3 bg-white border-2 {{ $deleted ? 'border-gray-800' : 'border-brand' }} rounded-xl shadow-lg px-5 py-4
           transition-all duration-500 ease-in-out"
    style="opacity: 0; transform: translateY(1rem);"
    role="alert"
    aria-live="polite">

    {{-- Icon --}}
    <i class="fa fa-check-circle {{ $deleted ? 'text-gray-800' : 'text-brand' }} text-lg mt-0.5 shrink-0" aria-hidden="true"></i>

    {{-- Content --}}
    <div class="flex-1 min-w-0">
        <p class="text-sm font-medium text-gray-800">{{ session('success') }}</p>

        @if (session('success_link'))
            <a href="{{ session('success_link') }}"
                class="inline-flex items-center gap-1 text-xs {{ $deleted ? 'text-gray-700 hover:text-gray-900' : 'text-primary hover:text-primary-hover' }} font-medium mt-1 transition-colors">
                View: "{{ session('success_link_label') }}"
                <i class="fa fa-arrow-right text-[10px]" aria-hidden="true"></i>
            </a>
        @endif
    </div>

    {{-- Close button --}}
    <button onclick="dismissToast()"
        class="text-gray-400 hover:text-gray-700 transition-colors shrink-0 cursor-pointer"
        aria-label="Close notification">
        <i class="fa fa-times" aria-hidden="true"></i>
    </button>
</div>

<script>
    function dismissToast() {
        const toast = document.getElementById('toast');
        toast.style.opacity = '0';
        toast.style.transform = 'translateY(1rem)';
        setTimeout(() => toast.remove(), 500);
    }

    setTimeout(() => {
        const toast = document.getElementById('toast');
        toast.style.opacity = '1';
        toast.style.transform = 'translateY(0)';
    }, 50);

    setTimeout(dismissToast, 4000);
</script>
@endif
