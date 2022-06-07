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
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script> --}}
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body class="font-prx antialiased bd">


    <div class="2xl:max-w-screen-xl xl:max-w-screen-lgz mx-auto bg">
        <div class="lg:container mx-auto min-h-screen">
            <header>
                @include('site.includes.menu')      
            </header>
        

        <!-- Page Content -->
        <main class="">
            {{ $slot }}
        </main>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>