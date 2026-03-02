@props(['product']);

<div>
    <input type="checkbox" name="select_products[]" value="{{ $product->id }}" />
    <div>
        @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" />
        @else
        <i>icon</i>
        @endif
    </div>
    <div class="border"></div>
    <div class="container">
        <div>
            <div>
                <p>Name</p>
                <h3>{{ $product->name }}</h3>
            </div>
            <div>
                <p>Item ID</p>
                <h3>{{ $product->id }}</h3>
            </div>
            <div>
                <p>Price</p>
                <h3>{{ number_format($product->price, 2) }}kr</h3>
            </div>
        </div>
        <div>
            <div>
                <p>Material</p>
                <h3>{{ $product->material ?? 'N/A' }}</h3>
            </div>
            <div>
                <p>Dimentions (H x W)</p>
                <h3>{{ $product->dimentions ?? 'N/A' }}</h3>
            </div>
            <div>
                <p>Product Type</p>
                <h3>{{ $product->productType->name }}</h3>
            </div>
        </div>
        <div>
            <p>Description</p>
            <p>{{ Str::limit($product->description, 180) }}</p>
        </div>
    </div>
</div>