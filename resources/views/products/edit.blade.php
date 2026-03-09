@extends('layouts.app')

@section('title', 'Edit Product - Cavelli Atelier')

@section('content')

    {{-- breadcrumbs --}}
    <x-breadcrumbs :links="[
        ['label' => 'Overview', 'url' => route('dashboard')],
        ['label' => 'Products', 'url' => route('products.index')],
        ['label' => $product->name, 'url' => route('products.edit', $product)],
        ['label' => 'Edit'],
    ]" />

    {{-- Rubrik + knappar --}}
    <div class="flex m-10 mb-px justify-between items-center">
        <h1 class="font-semibold text-lg">Edit Product</h1>
        <div class="flex gap-3">
            <button type="button" onclick="document.getElementById('confirm-delete-modal').showModal()"
                class="btn-danger">
                Delete Product
            </button>
            <button form="update-form" type="submit"
                class="btn-primary">
                Save Changes
            </button>
        </div>
    </div>

    <form id="update-form" method="POST" action="{{ route('products.update', $product) }}">
        @csrf
        @method('PUT')
        @include('products._form')
    </form>

    <x-confirm-delete-modal
        item="{{ $product->name }}"
        table="products"
        action="{{ route('products.destroy', $product) }}" />

@endsection