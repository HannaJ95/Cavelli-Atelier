@props(['sidebar'])

<aside class="sticky top-0 h-screen w-64 bg-[#a8c69f] p-8 flex flex-col gap-10 overflow-y-auto">
    <div class="border-b border-gray-800/20 pb-4">
        <h1 class="text-3xl font-serif tracking-tight text-gray-900 mt-4">
            Cavelli Atilier
        </h1>
    </div>
    
    <nav class="flex flex-col gap-8">
        <a href="{{ route('dashboard')}}" class="text-2xl font-medium text-gray-900 hover:text-white transition-colors cursor-pointer">
            Overview
        </a>
        
        <div>
            <button class="menu-toggle flex items-center justify-between w-full text-2xl font-medium text-gray-900 hover:text-white transition-colors cursor-pointer">
                Products
                <i class="fas fa-chevron-down text-sm ml-2 transition-transform duration-200"></i>
            </button>
            <div class="sub-menu hidden mt-4 ml-4 flex flex-col gap-3">
                <a href="{{ route('products.index') }}" class="text-lg text-gray-800 hover:underline">All product</a>
                <a href="{{ route('products.create') }}" class="text-lg text-gray-800 hover:underline">New product</a>
                <a href="{{ route('products.store') }}" class="text-lg text-gray-800 hover:underline">Edit product</a>
            </div>
        </div>

        <div>
            <button class="menu-toggle flex items-center justify-between w-full text-2xl font-medium text-gray-900 hover:text-white transition-colors cursor-pointer">
                Attributes
                <i class="fas fa-chevron-down text-sm ml-2 transition-transform duration-200"></i>
            </button>
            <div class="sub-menu hidden mt-4 ml-4 flex flex-col gap-3 text-lg text-gray-800">
                <a href="#" class="hover:underline">Colors</a>
                <a href="#" class="hover:underline">Materials</a>
                <a href="#" class="hover:underline">Rooms</a>
            </div>
            
        </div>
    </nav>
</aside>
<script>
    document.querySelectorAll('.menu-toggle').forEach(button => {
        button.addEventListener('click', () => {
            // Find the sub-menu right after the button
            const menu = button.nextElementSibling;
            // Find the icon inside the button
            const icon = button.querySelector('.fa-chevron-down');

            // Toggle the 'hidden' class on the menu
            menu.classList.toggle('hidden');

            // Rotate the arrow 180°
            icon.classList.toggle('rotate-180');
        });
    });
</script>