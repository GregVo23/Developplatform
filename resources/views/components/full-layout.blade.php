<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Developplatform') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!--AlpineJs-->
        <style>[x-cloak] { display: none; }</style>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/jquery.js') }}"></script>

        <!--Livewire-->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">

        <div class="min-h-screen bg-gray-100">
        <header class="pb-4 bg-gray-100">
            @include('layouts.navigation')
        </header>
        <main class="mt-4 mb-4">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-full lg:px-8">
            <h1 class="sr-only">Page title</h1>

                <section aria-labelledby="section-1-title">
                    <h2 class="sr-only" id="section-1-title">Section title</h2>
                    <div class="rounded-lg bg-white overflow-hidden shadow">
                    <div class="p-4">
                        <!-- Content -->
                        {{ $slot }}

                    </div>
                </div>
                </section>

            </div>
        </main>
        <footer id="footer">

            <!-- Column Content -->
            @include('partials.footer')
        </footer>
        </div>

        <!-- Specific Scripts -->
        @stack('scripts')
        <!--Livewire-->
        @livewireScripts
</body>
</html>
