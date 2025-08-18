<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Home QVC') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-200">
    @include('partials.mobile-menu')
        <!-- Màn hình tải trang -->
        <div id="loading-overlay" class="fixed inset-0 bg-white z-[100] flex items-center justify-center transition-opacity duration-500 ease-in-out">
            <div class="w-16 h-16 border-4 border-t-primary-500 border-gray-200 rounded-full animate-spin"></div>
        </div>

        <div class="min-h-screen">
            @include('layouts.partials.navbar')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        {{-- Đoạn script này chỉ giữ lại logic cho màn hình tải trang --}}
        <script>
            const loader = document.getElementById('loading-overlay');
            if (loader) {
                loader.classList.add('opacity-0');
                setTimeout(() => {
                    loader.style.display = 'none';
                }, 500);
            }
        </script>
    </body>
</html>
