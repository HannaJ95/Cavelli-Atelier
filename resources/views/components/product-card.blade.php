@props(['product'])

<div class="relative flex items-center bg-gray-100 border border-gray-300 rounded-2xl shadow-sm mb-4 p-6 gap-6 min-h-[160px]">
    <div class="absolute top-4 left-4">
        <input type="checkbox" name="select_products[]" value="{{ $product->id }}" 
            class="w-6 h-6 rounded border-gray-300 cursor-pointer transition-all" />
    </div>

    <div class="flex item-center ml-4">
        <div class="w-40 h-40 rounded-xl border border-gray-100 overflow-hidden flex items-center justify-center">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="object-cover w-full h-full" />
            @else
                <i class="fas fa-couch text-4xl"></i>
            @endif
        </div>
    </div>

    <div class="h-50 border-l border-gray-200"></div>

    <div class="grid grid-cols-4 flex-grow gap-8">
        <div class="flex flex-col justify-between">
            <div>
                <p class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Name</p>
                <h3 class="font-medium text-gray-800">{{ $product->name }}</h3>
            </div>
            <div class="mt-4">
                <p class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Product ID</p>
                <p class="font-medium text-gray-800">#{{ str_pad($product->id, 6, '0', STR_PAD_LEFT) }}</p>
            </div>
            <div class="mt-4">
                <p class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Price</p>
                <p class="font-medium text-gray-800">{{ number_format($product->price) }} kr</p>
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
                <p class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Dimentions (mm)</p>
                <p class="font-medium text-gray-800">{{ $product->dimensions ?? 'N/A' }}</p>
            </div>
            <div class="mt-4">
                <p class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Product Type</p>
                <p class="font-medium text-gray-800">{{ $product->productType->name }}</p>
            </div>
        </div>
        <div>
            <p class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Description</p>
            <p class="font-medium text-gray-800">{{ Str::limit($product->description, 180) }}</p>

            <div class="mt-4">
                <p class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Color</p>
                <p class="font-medium text-gray-800">
                    @if($product->colors->count() > 0)
                        {{ $product->colors->pluck('name')->join(', ') }}
                    @else
                        N/A
                    @endif
                </p>
            </div>

            <div class="mt-4">
                <p class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Weight</p>
                <p class="font-medium text-gray-800">
                    @if($product->weight)
                        {{ rtrim(rtrim($product->weight, '0'), '.') }} kg
                    @else
                        N/A
                    @endif
                </p>
            </div>

            {{-- <a href="{{ route('products.edit', $product) }}" class="bg-[#8eb88e] hover:bg-[#7a9e7a] text-white px-4 py-2.5 rounded-full flex items-center gap-2 transition-colors">
                <span class="text-xl">+</span> Update Product
            </a> --}}
        </div>
        <div class="flex flex-col items-center justify-center gap-10">
            <a href="{{ route('products.edit', $product) }}" class="text-gray-400 hover:text-[#8eb88e] transition-colors">
                <i class="fa fa-edit text-3xl"></i>
            </a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                @csrf
                @method('DELETE')
                <button class="text-gray-400 hover:text-red-500 transition-colors cursor-pointer">
                    <i class="fa fa-trash text-3xl"></i>
                </button>
            </form>
        </div>
    </div>
</div>