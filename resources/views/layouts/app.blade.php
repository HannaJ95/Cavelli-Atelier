<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>@yield('title', 'Cavelli Atelier')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 flex">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:z-50 focus:p-3 focus:bg-white focus:text-primary focus:rounded-lg focus:top-2 focus:left-2">
        Skip to main content
    </a>
    {{-- Sidebar --}}
    <div class="w-64 shrink-0 min-h-screen">
        @include('components.sidebar')
    </div>
    
    {{-- Main Content --}}
    <div class="flex-1">
        @yield('content')
    </div>

    <x-toast />
</body>
</html>