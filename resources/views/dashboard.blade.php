@extends('layouts.app')

@section('title', 'Dashboard - Cavelli Atelier')

@section('content')
<main class="flex min-h-screen">
    <!-- Sidebar -->
    <section class="w-64 flex-shrink-0">
        <x-sidebar />
    </section>

    <!-- Main Content -->
    <section class="flex-1 bg-gray-50 overflow-auto">
        <div class="p-10">
            @include('errors')
        
            <div class="bg-gray-100 border border-gray-300 shadow-sm rounded-lg p-10 pb-4 mb-6">
                <div class="flex justify-between items-start mb-6">
                    <h1 class="text-2xl font-bold text-gray-900">Welcome, {{ auth()->user()->name }}!</h1>
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="bg-gray-300 hover:bg-gray-400 text-gray-900 px-6 py-2 rounded-lg font-medium transition-colors cursor-pointer">
                            Logout
                        </button>
                    </form>
                </div>
                <hr class="border-gray-300 -mx-6 mb-6">
                <div class="space-y-4">
                    <h1 class="font-semibold text-lg p-4">Overview</h1>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

