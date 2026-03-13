@extends('layouts.app')

@section('title', 'Add New Product - Cavelli Atelier')


@section('content')
<main id="main-content" class="overflow-auto">

    {{-- breadcrumbs --}}
    <x-breadcrumbs :links="[
        ['label' => 'Overview', 'url' => route('dashboard')],
        ['label' => 'Products', 'url' => route('products.index')],
        ['label' => 'Add New Product'],
    ]" />

    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        {{-- Rubrik + knapp --}}
        <div class="flex m-10 mb-px justify-between items-center">
            <h1 class="font-semibold text-lg">Add New Product</h1>
            <button type="submit" class="btn-primary">
                Save Product
            </button>
        </div>
        @include('products._form')
    </form>

</main>
@endsection