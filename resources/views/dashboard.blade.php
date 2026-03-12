@extends('layouts.app')

@section('title', 'Dashboard - Cavelli Atelier')

@section('content')
<main id="main-content" class="flex min-h-screen">
    <section class="flex-1 bg-gray-50 overflow-auto">
        <div class="p-10">
            @include('errors')
        
            <header class="bg-gray-100 border border-gray-300 shadow-sm rounded-lg p-10 pb-4 mb-6">
                <div class="flex justify-between items-start mb-6">
                    <h1 class="text-2xl font-bold text-gray-900">Welcome, {{ auth()->user()->name }}!</h1>
                </div>
                <hr class="border-gray-300 -mx-6 mb-6">
                <div class="space-y-4">
                    <h2 class="font-semibold text-lg p-4">Overview</h2>
                </div>
            </header>
        </div>
    </section>
</main>
@endsection

