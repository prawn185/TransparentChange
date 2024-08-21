<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans">
<div class="flex min-h-[100dvh] flex-col">
    <header class="bg-background px-4 py-3 shadow-sm sm:px-6 lg:px-8">
        <div class="container mx-auto flex items-center justify-between">
            <a href="/" class="flex items-center">
                <svg class="h-8 w-8 text-primary" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg>
                <span class="ml-2 text-lg font-semibold">Transparent Change</span>
            </a>
            @include('livewire.layout.guest-navigation')
        </div>

    </header>

    <!-- Page Content -->
    <main class="flex-1">
        {{ $slot }}
    </main>

    @include('livewire.layout.footer')


</div>
@stack('scripts')
</body>
</html>
