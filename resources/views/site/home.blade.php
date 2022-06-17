<x-site-layout>
    {{-- Carousel --}}
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade class relative" data-bs-ride="carousel">
        <div class="carousel-indicators absolute right-0 -bottom-12 left-0 flex justify-center p-0 mb-4 md:hidden">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
        </div>
        <div class="carousel-inner relative w-full overflow-hidden">
            <div class="carousel-item active relative float-left w-full">
                <a href="https://bileto.sympla.com.br/event/74354/d/144943" target="_blank">
                    <img src="{{ asset('images/home/Supershows.png') }}" class="hidden lg:block w-full" alt="Risadaria Supershow"/>
                    <img src="{{ asset('images/home/Supershows_m.png') }}" class="block lg:hidden w-full" alt="Risadaria Supershow"/>
                </a>
                {{-- <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(15).jpg" class="block w-full" alt="..."/> --}}
                {{-- <div class="carousel-caption hidden md:block absolute text-center">
                    <h5 class="text-xl">First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div> --}}
            </div>
            <div class="carousel-item relative float-left w-full">
                <a href="https://bileto.sympla.com.br/event/73368/d/138921/s/890886" target="_blank">
                    <img src="{{ asset('images/home/KAMBALACHO.png') }}" class="hidden lg:block w-full" alt="Kambalacho"/>
                    <img src="{{ asset('images/home/KAMBALACHO_m.png') }}" class="block lg:hidden w-full" alt="Kambalacho"/>
                </a>
            </div>
            <div class="carousel-item relative float-left w-full">
                <a href="https://bileto.sympla.com.br/event/74355/d/144944/s/947897" target="_blank">
                    <img src="{{ asset('images/home/Supershows_2.png') }}" class="hidden lg:block w-full" alt="Risadaria Supershow"/>
                    <img src="{{ asset('images/home/Supershows_2_m.png') }}" class="block lg:hidden w-full" alt="Risadaria Supershow"/>
                </a>
            </div>
            <div class="carousel-item relative float-left w-full">
                <a href="https://bileto.sympla.com.br/event/71735/d/144946/s/947903" target="_blank">
                    <img src="{{ asset('images/home/AQUELA-DUPLA.png') }}" class="hidden lg:block w-full" alt="Aquela Dupla"/>
                    <img src="{{ asset('images/home/AQUELA-DUPLA_m.png') }}" class="block lg:hidden w-full" alt="Aquela Dupla"/>
                </a>
            </div>
            <div class="carousel-item relative float-left w-full">
                <a href="https://bileto.sympla.com.br/event/69674/d/144945" target="_blank">
                    <img src="{{ asset('images/home/BAD-TRIP.png') }}" class="hidden lg:block w-full" alt="Bad Trip"/>
                    <img src="{{ asset('images/home/BAD-TRIP_m.png') }}" class="block lg:hidden w-full" alt="Bad Trip"/>
                </a>
            </div>
        </div>
        <button class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-cen border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-cen border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="items-center grid gap-8 lg:grid lg:grid-cols-6 lg:gap-28 py-12">
        <div class="lg:col-span-2">
            <div class="max-w-xs md:max-w-sm mx-auto border-2 border-white p-8 text-[31px] text-center leading-[3rem]">
                <span class="font-bld text-[61px] xl:text-[81px]">01</span> a <span class="font-bld text-[61px] xl:text-[81px]">31</span><br>
                de <span class="font-bld text-[50px] xl:text-[58px]">julho</span><br>
                <span class="font-bld text-[35px] xl:text-[45px] text-amarelo">Não perca!</span>
            </div>
        </div>
        <div class="lg:col-span-4">
            <div class="aspect-w-16 aspect-h-9"> 
                {!! $page->video->embed !!}
            </div>
        </div>
    </div>
</x-site-layout>