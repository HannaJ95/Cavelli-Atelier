@props(['product'])

<div class="relative flex items-center bg-gray-100 border border-gray-300 rounded-2xl shadow-sm mb-4 p-6 gap-6 min-h-[160px]">
    <div class="absolute top-4 left-4">
        <input type="checkbox" name="select_products[]" value="{{ $product->id }}" 
            class="w-6 h-6 rounded border-gray-300 cursor-pointer transition-all" />
    </div>

    <div class="flex item-center ml-4">
        <div class="w-32 h-32 rounded-xl border border-gray-100 overflow-hidden flex items-center justify-center">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="object-cover w-full h-full" />
            @else
                <i class="fas fa-couch text-4xl"></i>
            @endif
        </div>
    </div>

    <div class="h-50 border-l border-gray-200"></div>

    <div class="grid grid-cols-3 flex-grow gap-8">
        <div class="flex flex-col justify-between">
            <div>
                <p class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Name</p>
                <h3 class="font-medium text-gray-800">{{ $product->name }}</h3>
            </div>
            <div class="mt-4">
                <p class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Product ID</p>
                <p class="font-medium text-gray-800">#{{ str_pad($product->id, 6, '0', STR_PAD_LEFT) }}</h3>
            </div>
            <div class="mt-4">
                <p class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Price</p>
                <p class="font-medium text-gray-800">{{ number_format($product->price) }} kr</h3>
            </div>
        </div>
        <div class="flex flex-col justify-between">
            <div>
                <p class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Material</p>
                <p class="font-medium text-gray-800">
                    @if($product->materials->count() > 0)
                        {{ $product->materials->pluck('name')->join(', ') }}
                    @else
                        N/A
                    @endif
                </p>
            </div>
            <div class="mt-4">
                <p class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Dimentions (H x W)</p>
                <p class="font-medium text-gray-800">{{ $product->dimentions ?? 'N/A' }}</h3>
            </div>
            <div class="mt-4">
                <p class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Product Type</p>
                <p class="font-medium text-gray-800">{{ $product->productType->name }}</h3>
            </div>
        </div>
        <div>
            <p class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Description</p>
            <p class="font-medium text-gray-800">{{ Str::limit($product->description, 180) }}</p>

            <a href="{{ route('products.edit', $product) }}" class="bg-[#8eb88e] hover:bg-[#7a9e7a] text-white px-4 py-2.5 rounded-full flex items-center gap-2 transition-colors">
                <span class="text-xl">+</span> Update Product
            </a>
            
        </div>
    </div>
</div>