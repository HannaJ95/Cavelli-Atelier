@php $editing = isset($product); @endphp

<div class="flex flex-wrap gap-10 m-10">

    {{-- LEFT COLUMN --}}
    <div class="flex flex-col gap-10 flex-[3] min-w-80">

        {{-- SECTION: Name and Description --}}
        <x-form-section title="Name and Description">
            <div class="flex flex-col gap-5">

                {{-- product name --}}
                <div>
                    <label class="form-label" for="name">Product Name:</label>
                    <input class="input-field @error('name') !border-red-500 @enderror" type="text" id="name" name="name" required maxlength="255" placeholder="e.g. Milano Leather Sofa" value="{{ old('name', $product->name ?? '') }}">
                    <x-input-error field="name" />
                </div>

                {{-- description --}}
                <div>
                    <label class="form-label" for="description">Product Description:</label>
                    <textarea class="input-field @error('description') !border-red-500 @enderror" id="description" name="description" maxlength="2000" rows="5" placeholder="Describe the product's design, feel, and key features...">{{ old('description', $product->description ?? '') }}</textarea>
                    <x-input-error field="description" />
                </div>

            </div>
        </x-form-section>

        {{-- SECTION: Product Details --}}
        <x-form-section title="Product Details">
            <div class="flex flex-col gap-5">

                <fieldset>
                    <legend class="form-label pb-2">Properties:</legend>
                    <div class="flex flex-wrap gap-2">

                        {{-- height width length --}}
                        @foreach (['height', 'width', 'length'] as $dim)
                        <div class="flex flex-col flex-1">
                            <label class="text-sm text-gray-500 mb-1" for="{{ $dim }}">
                                {{ ucfirst($dim) }} (mm):
                            </label>
                            <input class="border border-gray-200 rounded-lg px-3 py-2 bg-gray-50 @error($dim) !border-red-500 @enderror"
                                type="number" id="{{ $dim }}" name="{{ $dim }}"
                                min="0" max="100000"
                                value="{{ old($dim, $product->$dim ?? '') }}" placeholder="e.g. 800">
                            <x-input-error field="{{ $dim }}" />
                        </div>
                        @endforeach

                        {{-- weight --}}
                        <div class="flex flex-col flex-1">
                            <label class="text-sm text-gray-500 mb-1" for="weight">Weight (kg):</label>
                            <input class="border border-gray-200 rounded-lg px-3 py-2 bg-gray-50 @error('weight') !border-red-500 @enderror" type="number" id="weight" name="weight" min="0" max="999999.99" step="0.01" value="{{ old('weight', $product->weight ?? '') }}" placeholder="e.g. 12.5">
                            <x-input-error field="weight" />
                        </div>
                    </div>
                </fieldset>

                {{-- Materials multi-select --}}
                <div class="flex flex-col gap-2">
                    <x-checkbox-dropdown label="Materials:" :items="$materials" name="materials"
                        :selected="$editing ? $product->materials->pluck('id')->toArray() : []" />

                    {{-- Colors multi-select --}}
                    <x-checkbox-dropdown label="Colors:" :items="$colors" name="colors"
                        :selected="$editing ? $product->colors->pluck('id')->toArray() : []" />
                </div>
            </div>
        </x-form-section>

    </div>

    {{-- RIGHT COLUMN --}}
    <div class="flex flex-col gap-10 flex-[2] min-w-64">

        {{-- SECTION: Category --}}
        <x-form-section title="Category">
                <div>
                    <label class="form-label" for="category_id">Product Category:</label>
                    <select class="@error('category_id') !border-red-500 @enderror" id="category_id" name="category_id" required>
                        <option value="">-- Select category --</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product->productType->category_id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    <x-input-error field="category_id" />
                </div>

                <div>
                    <label class="form-label" for="product_type_id">Product Sub-Category:</label>
                    <select class="@error('product_type_id') !border-red-500 @enderror" id="product_type_id" name="product_type_id" required>
                        <option value="">-- Select type --</option>
                        @foreach ($productTypes as $type)
                        <option value="{{ $type->id }}"
                            {{ old('product_type_id', $product->product_type_id ?? '') == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                        @endforeach
                    </select>
                    <x-input-error field="product_type_id" />
                </div>
        </x-form-section>

        {{-- SECTION: Pricing --}}
        <x-form-section title="Pricing">
            <div class="flex gap-4">

                <div class="flex-1">
                    <label class="form-label" for="price">Price (kr)</label>
                    <input class="input-field @error('price') !border-red-500 @enderror" type="number" required id="price" name="price" step="0.01" min="0.01" max="99999999.99" placeholder="e.g. 4999" value="{{ old('price', $product->price ?? '') }}">
                    <x-input-error field="price" />
                </div>

                <!-- <div class="flex-1">
                    <label class="form-label" for="discount">Discount</label>
                    <input class="input-field" type="number" id="discount" name="discount">
                </div> -->

            </div>
        </x-form-section>

        {{-- SECTION: Upload Images --}}
        <x-form-section title="Upload Images">
            <div>
                <div>img placeholder</div>
                <div>img placeholder</div>
                <div>img placeholder</div>
            </div>
        </x-form-section>

    </div>
</div>