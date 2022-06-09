<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @stack('styles')
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bd">
        <x-jet-banner />

        <div class="min-h-screen">
            @include('admin.includes.navigation-menu')

            <div class="flex flex-wrap lg:mx-8">
                @include('admin.includes.menu')

                <div class="w-full lg:w-10/12 p-4">
                    <!-- Page Heading -->
                    @if (isset($header))
                        <header class="">
                            {{-- <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"> --}}
                                {{ $header }}
                            {{-- </div> --}}
                        </header>
                    @endif

                    <!-- Page Content -->
                    <main class="">
                        {{ $slot }}
                    </main>
                </div>
            </div>

            
        </div>

        @stack('modals')
        @stack('scripts')
        @livewireScripts
    </body>
</html>
