<nav class="flex flex-wrap items-center justify-between w-full py-4 lg:py-8 text-lg text-white">
    <div class="px-6 md:px-4">
        <a href="{{ route('home') }}">
            <img id="logo" src="{{ asset('images/logos/risadaria.svg') }}">
        </a>
    </div>

   <img id="menu-button" src="{{ asset('images/icons/bars-solid.svg') }}" class="h-6 w-6 cursor-pointer lg:hidden block mr-6">
  
    <div class="hidden w-full lg:flex lg:items-center lg:w-auto pt-4 lg:mr-5" id="menu">
        <ul class="text-sm lg:flex lg:justify-between font-bld">
            <li>
                <a class="lg:px-0.5 py-0 block" href="{{ route('sobre') }}">
                    <div class="parallelogram bg-verde hover:opacity-50"><span class="txt">Sobre o Festival</span></div>
                </a>
            </li>
            {{-- <li>
                <a class="lg:px-0.5 py-0 block" href="#">
                    <div class="parallelogram bg-azul-m hover:opacity-50"><span class="txt">Line-up</span></div>
                </a>
            </li> 
            <li>
                <a class="lg:px-0.5 py-0 block" href="#">
                    <div class="parallelogram bg-azul hover:opacity-50"><span class="txt">Programação Adulto</span></div>
                </a>
            </li>
            <li>
                <a class="lg:px-0.5 py-0 block" href="#">
                    <div class="parallelogram bg-vermelho hover:opacity-50"><span class="txt">Programação Infantil</span></div>
                </a>
            </li> --}}
            <li>
                <a class="lg:px-0.5 py-0 block" href="{{ route('contato') }}">
                    <div class="parallelogram bg-laranja hover:opacity-50"><span class="txt">Contato</span></div>
                </a>
            </li>
        </ul>
    </div>
</nav>