<x-site-layout>
    {{-- Carousel --}}
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade class relative" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-indicators absolute right-0 -bottom-12 left-0 flex justify-center p-0 mb-4 md:hidden">
            <?php $i = 0;?>
            @foreach ($banners as $banner)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $i }}" class="@if ($i == 0) active @endif" aria-current="true" aria-label="{{ $banner->title }}"></button>
                <?php $i++;?>
            @endforeach
        </div>
        <div class="carousel-inner relative w-full overflow-hidden">
            <?php $j = 0;?>
            @foreach ($banners as $banner)
                <div class="carousel-item @if ($j == 0) active @endif relative float-left w-full">
                    <a href="{{ $banner->link_pago }}" target="_blank">
                        <img src="{{ url("storage/agendas/$banner->banner") }}" class="hidden lg:block w-full" alt="{{ $banner->title }}"/>
                        <img src="{{ url("storage/agendas/$banner->banner_mobile") }}" class="block lg:hidden w-full" alt="{{ $banner->title }}"/>
                    </a>
                </div>
                <?php $j++;?>
            @endforeach
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