@props(['product']);

<div class="flex item-center border border-gray-200 rounded-2xl">
    <div class="flex items-center gap-4">
        <input type="checkbox" name="select_products[]" value="{{ $product->id }}" class="rounded border-gray-300"/>
        <div>
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" />
            @else
            <i>icon</i>
            @endif
        </div>
    </div>
    <div class="border"></div>
    <div class="container">
        <div>
            <div>
                <p>Name</p>
                <h3>{{ $product->name }}</h3>
            </div>
            <div>
                <p>Product ID</p>
                <p>{{ str_pad($product->id, 6, '0', STR_PAD_LEFT) }}</h3>
            </div>
            <div>
                <p>Price</p>
                <p>{{ number_format($product->price, 2) }}kr</h3>
            </div>
        </div>
        <div>
            <div>
                <p>Material</p>
                <p>{{ $product->material ?? 'N/A' }}</h3>
            </div>
            <div>
                <p>Dimentions (H x W)</p>
                <p>{{ $product->dimentions ?? 'N/A' }}</h3>
            </div>
            <div>
                <p>Product Type</p>
                <p>{{ $product->productType->name }}</h3>
            </div>
        </div>
        <div>
            <p>Description</p>
            <p>{{ Str::limit($product->description, 180) }}</p>
        </div>
    </div>
</div>