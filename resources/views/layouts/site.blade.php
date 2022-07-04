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

{{-- <body class="font-prx antialiased min-h-screens bds"> --}}
<body class="font-prx antialiased min-h-screend bd">


        <div class="2xl:max-w-screen-xl xl:max-w-screen-lg mx-auto">
            <div class="lg:container mx-auto min-h-[95vh]">
                <header>
                    @include('site.includes.menu')      
                </header>
            
    
                <!-- Page Content -->
                <main class="px-6 md:px-4">
                    {{ $slot }}
                </main>
            </div>
        </div>

        <footer class="bg-white relative min-h-[5vh]">
            <img src="{{ asset('images/patrocinadores.jpg') }}" alt="Patrocinadores" class="w-full" >
            {{-- https://zaneray.com/responsive-image-map/ --}}
            <a href="https://www.shoppingpatiopaulista.com.br/" title="Shopping Patio Paulista" style="position: absolute; left: 17.03%; top: 34.36%; width: 13.39%; height: 44.4%; z-index: 2;" target="_blank"></a>
            <a href="https://www.usiminas.com/" title="Usiminas" style="position: absolute; left: 32.76%; top: 39.38%; width: 15.47%; height: 40.93%; z-index: 2;" target="_blank"></a>
            <a href="https://www.mundobic.com.br/depto/barbear/barbeadores" title="Bic Confort 3" style="position: absolute; left: 49.58%; top: 40.54%; width: 12.03%; height: 39.77%; z-index: 2;"></a>
            <a href="https://www.razzo.com.br/" title="Razzo" style="position: absolute; left: 63.7%; top: 50.58%; width: 8.07%; height: 28.96%; z-index: 2;" target="_blank"></a>
            <a href="https://www.aeroglos.com.br/" title="Aeroglós" style="position: absolute; left: 72.29%; top: 50.97%; width: 9.38%; height: 28.96%; z-index: 2;" target="_blank"></a>
            <a href="https://www.uol.com.br/" title="UOL" style="position: absolute; left: 82.92%; top: 52.51%; width: 7.24%; height: 27.8%; z-index: 2;" target="_blank"></a>
            <a href="https://www.band.uol.com.br/bandnews-fm" title="Band News FM" style="position: absolute; left: 91.3%; top: 50.19%; width: 4.53%; height: 29.73%; z-index: 2;" target="_blank"></a>
        </footer>
      {{-- </body> --}}


    {{-- <div class="2xl:max-w-screen-xl xl:max-w-screen-lg mx-auto">
        <div class="lg:container mx-auto ">
            <header>
                @include('site.includes.menu')      
            </header>
        

            <!-- Page Content -->
            <main class="px-6 md:px-4">
                {{ $slot }}
            </main>
        </div>
    </div>

    <footer class="bg-white  inset-x-0 bottom-0">
        <img src="{{ asset('images/patrocinadores.png') }}" alt="Patrocinadores" class="w-full" >
        https://zaneray.com/responsive-image-map/
        <a href="https://www.usiminas.com/" title="Usiminas" style="position: absolute; left: 12.62%; top: 48.94%; width: 15.07%; height: 27.84%; z-index: 9001;"></a>
        <a href="https://www.mundobic.com.br/depto/barbear/barbeadores" title="Bic Confort 3" style="position: absolute; left: 28.59%; top: 48.4%; width: 9.86%; height: 27.84%; z-index: 9002;"></a>
        <a href="https://www.razzo.com.br/" title="Razzo" style="position: absolute; left: 40.75%; top: 48.4%; width: 6.4%; height: 27.84%; z-index: 9003;"></a>
        <a href="https://www.aeroglos.com.br/" title="Aeroglós" style="position: absolute; left: 48.11%; top: 49.82%; width: 6.63%; height: 27.84%; z-index: 9004;"></a>
        <a href="https://www.uol.com.br/" title="UOL" style="position: absolute; left: 56.24%; top: 50.71%; width: 5.21%; height: 27.84%; z-index: 9005;"></a>
        <a href="https://www.band.uol.com.br/bandnews-fm" title="Band News FM" style="position: absolute; left: 62.2%; top: 50.53%; width: 4.42%; height: 27.84%; z-index: 9005;"></a>
    </footer> --}}

    @stack('modals')

    @livewireScripts
</body>

</html>
