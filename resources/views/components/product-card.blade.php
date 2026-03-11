@props(['product'])

<article class="relative flex flex-col lg:flex-row bg-gray-100 border border-gray-300 rounded-2xl shadow-sm mb-4 overflow-hidden min-w-0">

    {{-- Left: Image panel --}}
    <div class="flex items-center justify-center bg-gray-200 shrink-0
                w-full h-40 lg:w-48 lg:h-auto">
        @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="Product image: {{ $product->name }}"
                class="object-cover w-full h-full" />
        @else
            <i class="fas fa-couch text-4xl text-gray-400" aria-hidden="true"></i>
        @endif
    </div>

    {{-- Divider --}}
    <div class="hidden lg:block w-px bg-gray-300 shrink-0"></div>
    <div class="block lg:hidden h-px bg-gray-300 w-full"></div>

    {{-- Center: Info --}}
    <div class="flex-1 min-w-0 p-5 lg:p-6">

        {{-- Top row: Name + ID + Price --}}
        <div class="flex flex-wrap items-start gap-x-8 gap-y-2 mb-4 pb-4 border-b border-gray-200">
            <div>
                <p class="uppercase-text">Name</p>
                <h2 class="product-text-medium">{{ $product->name }}</h2>
            </div>
            <div>
                <p class="uppercase-text">Price</p>
                <p class="product-text-medium">{{ number_format($product->price) }} kr</p>
            </div>
            <div>
                <p class="uppercase-text">Product ID</p>
                <p class="product-text-small">#{{ str_pad($product->id, 6, '0', STR_PAD_LEFT) }}</p>
            </div>
        </div>

        {{-- Bottom row: 2 columns, each stacked --}}
        <div class="grid grid-cols-2 gap-x-8 gap-y-3">
            
            {{-- Left column --}}
            <div class="flex flex-col gap-3">
                <div>
                    <p class="uppercase-text">Material</p>
                    <p class="product-text-small">
                        {{ $product->materials->count() > 0 ? $product->materials->pluck('name')->join(', ') : 'N/A' }}
                    </p>
                </div>
                <div>
                    <p class="uppercase-text">Color</p>
                    <p class="product-text-small">
                        {{ $product->colors->count() > 0 ? $product->colors->pluck('name')->join(', ') : 'N/A' }}
                    </p>
                </div>
                <div>
                    <p class="uppercase-text">Product Type</p>
                    <p class="product-text-small">{{ $product->productType->name }}</p>
                </div>
            </div>

            {{-- Right column --}}
            <div class="flex flex-col gap-3">
                <div>
                    <p class="uppercase-text">Dimensions (mm)</p>
                    <p class="product-text-small">{{ $product->dimensions ?? 'N/A' }}</p>
                </div>
                <div>
                    <p class="uppercase-text">Weight</p>
                    <p class="product-text-small">
                        @if($product->weight)
                            {{ rtrim(rtrim($product->weight, '0'), '.') }} kg
                        @else
                            N/A
                        @endif
                    </p>
                </div>
                <div>
                    <p class="uppercase-text">Description</p>
                    <p class="product-text-small">{{ Str::limit($product->description, 180) }}</p>
                </div>
            </div>

        </div>
    </div>

    {{-- Divider --}}
    <div class="hidden lg:block w-px bg-gray-300 shrink-0" aria-hidden="true"></div>
    <div class="block lg:hidden h-px bg-gray-300 w-full" aria-hidden="true"></div>

    {{-- Right: Actions panel --}}
    <div class="flex lg:flex-col items-center justify-center gap-6 lg:gap-8
                p-4 lg:px-6 lg:py-6 shrink-0">
        <a href="{{ route('products.edit', $product) }}" class="text-gray-400 hover:text-[#8eb88e] transition-colors cursor-pointer text-center"
           aria-label="Edit product: {{ $product->name }}">
            <p class="uppercase-text">Edit</p>
            <i class="fa fa-edit text-2xl lg:text-3xl" aria-hidden="true"></i>
        </a>
            <button onclick="document.getElementById('confirm-delete-modal').showModal()"
                    type="submit" class="text-gray-400 hover:text-red-500 transition-colors cursor-pointer text-center"
                    aria-label="Delete product: {{ $product->name }}">
                <p class="uppercase-text">Delete</p>
                <i class="fa fa-trash text-2xl lg:text-3xl" aria-hidden="true"></i>
            </button>
            <x-confirm-delete-modal
                item="{{ $product->name }}"
                table="products"
                action="{{ route('products.destroy', $product) }}" 
            />
    </div>

</article>