<x-site-layout>
    <div>
        <h1 class="text-white text-3xl lg:text-4xl font-bold">Contato</h1>
    </div>

    {{-- Mobile --}}
    <div class="bg-white rounded-md text-azul-m p-3 my-3 md:my-5 lg:hidden">
        <h2 class="font-bld text-azul-e sm:text-lg ml-4 sm:ml-7">Contato</h2>
        <span class="inline-flex items-baseline">
            <img src="{{ asset('images/icons/envelope.svg') }}" alt="" class="self-center w-4 h-4 sm:w-6 sm:h-6 mr-0.5 sm:mr-1 icon-envelope" />
            <span class="text-xs sm:text-base">contato@conteudocriativo.com.br</span>
        </span>

        <h2 class="font-bld text-azul-e sm:text-lg ml-4 sm:ml-7 mt-2 sm:mt-3">Assessoria de Imprensa:</h2>
        <div>
            <span class="inline-flex items-baseline">
                <img src="{{ asset('images/icons/envelope.svg') }}" alt="" class="self-center w-4 h-4 sm:w-6 sm:h-6 mr-0.5 sm:mr-1 icon-envelope" />
                <span class="text-xs sm:text-base">contato@ftestrategias.com.br</span>
            </span>
        </div>

        <div>
            <span class="inline-flex items-baseline sm:mt-2">
                <img src="{{ asset('images/icons/phone.svg') }}" alt="" class="self-center w-4 h-4 sm:w-6 sm:h-6 mr-0.5 sm:mr-1 icon-phone" />
                <span class="text-xs sm:text-base">11 94064-7148</span>
            </span>
        </div>
    </div>

    {{-- Desktop --}}
    <div class="hidden lg:block w-[866px] h-[534px] text-azul-m mx-auto" style="background-image: url({{ asset('images/contato/bg_contato_full.png') }})">
        <div class="pt-52 pl-32">
            <h2 class="font-bld text-azul-e text-2xl ml-10">Contato</h2>
            <span class="inline-flex items-baseline">
                <img src="{{ asset('images/icons/envelope.svg') }}" alt="" class="self-center w-8 h-8 mr-2 icon-envelope" />
                <span class="text-lg">contato@conteudocriativo.com.br</span>
            </span>

            <h2 class="font-bld text-azul-e text-2xl ml-10 mt-6">Assessoria de Imprensa:</h2>
            <div>
                <span class="inline-flex items-baseline">
                    <img src="{{ asset('images/icons/envelope.svg') }}" alt="" class="self-center w-8 h-8 mr-2 icon-envelope" />
                    <span class="text-lg">contato@ftestrategias.com.br</span>
                </span>
            </div>

            <div>
                <span class="inline-flex items-baseline mt-4">
                    <img src="{{ asset('images/icons/phone.svg') }}" alt="" class="self-center w-8 h-8 mr-2 icon-phone" />
                    <span class="text-lg">11 94064-7148</span>
                </span>
            </div>
        </div>
        
    </div>

    <div class="my-4">
        <span class="inline-flex items-center">
            <span class="text-xs sm:text-sm md:text-base lg:text-lg">Acesse nossas redes sociais: </span>
            <a href="https://www.instagram.com/risadaria" target="_blank"><img src="{{ asset('images/contato/insta.png') }}" alt="Instagram" class="self-center w-8 h-8 mx-2" /></a>
            <a href="https://web.facebook.com/RISADARIA" target="_blank"><img src="{{ asset('images/contato/face.png') }}" alt="Facebook" class="self-center w-8 h-8 mx-2" /></a>
            <a href="https://www.youtube.com/user/Risadaria" target="_blank"><img src="{{ asset('images/contato/yt.png') }}" alt="Youtube" class="self-center w-8 h-8 mx-2" /></a>
            <a href="https://twitter.com/RISADARIA" target="_blank"><img src="{{ asset('images/contato/tw.png') }}" alt="Twitter" class="self-center w-8 h-8 mx-2" /></a>
        </span>
    </div>
</x-site-layout>



Entre os dias 5 e 14 de julho, o shopping Tietê receberá atrações do Risadaria. O local servirá de palco para  apresentações gratuitas dos grandes nomes do humor. Duração aproximada: 25 minutos Classificação indicativa: 16 anos.