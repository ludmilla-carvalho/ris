<nav class="flex flex-wrap items-center justify-between w-full py-4 lg:py-8 text-lg text-white">
    <div class="px-6 md:px-4">
        <a href="{{ route('home') }}">
            <img id="logo" src="{{ asset('images/logos/risadaria.svg') }}">
        </a>
    </div>

   <img id="menu-button" src="{{ asset('images/icons/bars-solid.svg') }}" class="h-6 w-6 cursor-pointer lg:hidden block mr-6">
  
    <div class="hidden w-full lg:flex lg:items-center lg:w-auto pt-4 lg:mr-5" id="menu">
        <ul class="text-sm lg:flex lg:justify-between font-bld">
            @foreach ($pages_menu as $pg)
                @if ($pg->active == 1 && $pg->id != 1)
                    <li>
                        <a class="lg:px-0.5 py-0 block" href="{{ route($pg->slug) }}">
                            <div class="parallelogram bg-{{ $pg->cor }} hover:opacity-50"><span class="txt">{{ $pg->name }}</span></div>
                        </a>
                    </li>
                @endif
            @endforeach
            {{-- <div class="bg-verde bg-azul bg-azul-m bg-vermelho bg-laranja"></div> --}}
            
        </ul>
    </div>
</nav>