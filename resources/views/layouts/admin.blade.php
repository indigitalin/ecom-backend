<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    @livewire('wire-elements-modal')
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-slate-50 dark:bg-gray-900">
        <livewire:layout.admin.topbar />
        <livewire:layout.admin.sidebar />
        <main class="mt-12 dashboard-container sm:ms-64 mx-auto px-3 sm:px-6 lg:px-8">
            <div class="py-12">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
<x-toaster-hub class="text-md" />
</html>
