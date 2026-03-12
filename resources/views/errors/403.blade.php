@extends('layouts.minimal')

@section('title', '403 - Cavelli Atelier')

@section('content')

<main class="flex-1 bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="text-center p-20 bg-gray-100 border border-gray-300 rounded-2xl shadow-sm max-w-md">
        <p class="text-6xl font-serif text-gray-300 mb-4">403</p>
        <h1 class="text-xl font-bold text-gray-800 mb-2">Access denied</h1>
        <p class="text-gray-500 text-sm mb-8">You don't have permission to view this page.</p>
        <a href="{{ route('login') }}"
            class="bg-primary hover:bg-primary-hover text-white px-6 py-2.5 rounded-full text-sm font-medium transition-colors">
            Back
        </a>
    </div>
</main>

@endsection
