@props(['sidebar'])

<aside class="sticky top-0 h-screen w-64 bg-[#a8c69f] p-5 lg:p-8 flex flex-col gap-6 lg:gap-10 overflow-y-auto">
    <div class="border-b border-gray-800/20 pb-4">
        <h1 class="text-xl lg:text-3xl font-serif tracking-tight text-gray-900 mt-4">
            Cavelli Atilier
        </h1>
    </div>

    <nav class="flex flex-col gap-5 lg:gap-8">
        <a href="{{ route('dashboard')}}" class="text-lg lg:text-2xl font-medium text-gray-900 hover:text-white transition-colors cursor-pointer">
            Overview
        </a>

        <div>
            <button class="menu-toggle flex items-center justify-between w-full text-lg lg:text-2xl font-medium text-gray-900 hover:text-white transition-colors cursor-pointer">
                Products
                <i class="fas fa-chevron-down text-sm ml-2 transition-transform duration-200"></i>
            </button>
            <div class="sub-menu hidden mt-3 ml-4 flex flex-col gap-3">
                <a href="{{ route('products.index') }}" class="text-base lg:text-lg text-gray-800 hover:underline">All products</a>
                <a href="{{ route('products.create') }}" class="text-base lg:text-lg text-gray-800 hover:underline">New product</a>
                <a href="{{ route('products.store') }}" class="text-base lg:text-lg text-gray-800 hover:underline">Edit product</a>
            </div>
        </div>

        <div>
            <button class="menu-toggle flex items-center justify-between w-full text-lg lg:text-2xl font-medium text-gray-900 hover:text-white transition-colors cursor-pointer">
                Attributes
                <i class="fas fa-chevron-down text-sm ml-2 transition-transform duration-200"></i>
            </button>
            <div class="sub-menu hidden mt-3 ml-4 flex flex-col gap-3 text-gray-800">
                <a href="{{ route('colors.index') }}" class="text-base lg:text-lg hover:underline">Colors</a>
                <a href="{{ route('materials.index') }}" class="text-base lg:text-lg hover:underline">Materials</a>
            </div>
        </div>
    </nav>
</aside>

<script>
    document.querySelectorAll('.menu-toggle').forEach(button => {
        button.addEventListener('click', () => {
            const menu = button.nextElementSibling;
            const icon = button.querySelector('.fa-chevron-down');
            menu.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });
    });
</script>