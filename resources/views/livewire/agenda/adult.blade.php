<div id="programacao" class="my-3 md:my-5">
    <div class="rounded-md bg-white font-bld text-center py-5">
        <div class="cont text-white">
            <h3 class="text-2xl lg:3xl text-verde mb-2 lg:inline-block lg:mr-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-10 md:w-12  lg:w-15" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="#1a5b2e" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"/></svg>
                Busque por: 
            </h3>

            <div class="parallelogram bg-laranja hover:opacity-75 w-40 sm:w-[110px] mx-auto mb-2 sm:inline-block {!! $filters['type'] == 'performer' ? 'border-b-4 border-gray-500' : 'border-b-0' !!}" wire:click="setSearch('performer')"><span class="txt">Artista</span></div>
            
            <div class="parallelogram bg-vermelho hover:opacity-75 w-40 sm:w-[110px] mx-auto mb-2 sm:inline-block {!! $filters['type'] == 'region' ? 'border-b-4 border-gray-500' : 'border-b-0' !!}" wire:click="setSearch('region')"><span class="txt">Local</span></div>

            <div class="parallelogram bg-azul hover:opacity-75 w-40 sm:w-[110px] mx-auto mb-2 sm:inline-block {!! $filters['type'] == 'category' ? 'border-b-4 border-gray-500' : 'border-b-0' !!}" wire:click="setSearch('category')"><span class="txt">Categoria</span></div>

            <div class="parallelogram bg-azul-m hover:opacity-75 w-40 sm:w-[110px] mx-auto mb-2 sm:inline-block {!! $filters['type'] == 'date' ? 'border-b-4 border-gray-500' : 'border-b-0' !!}" wire:click="setSearch('date')"><span class="txt">Data</span></div>

            

            @if ($filters['type'] == 'performer')
                <div class="my-3 md:my-5 text-lg md:text-xl lg:text-2xl xl:text-3xl">
                    <?php 
                        $letters = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'X', 'W', 'Y', 'Z');
                    ?>
                    @foreach ($letters as $letter)
                        <a class="hover:bg-orange-500 hover:text-white px-0.5 lg:px-1 {!! $filters['value'] == $letter ? 'bg-orange-500 text-white' : 'text-orange-500' !!}" wire:click="setSearch(null, '{{ $letter }}')">{{ $letter }}</a>
                    @endforeach
                
                </div>
            @endif

            @if ($filters['type'] == 'region')
                <div class="my-3 md:my-5 text-lg md:text-xl lg:text-2xl xl:text-3xl">
                    @foreach ($regions as $reg)
                        <a class="hover:bg-vermelho hover:text-white px-1 lg:px-2 {!! $filters['value'] == $reg ? 'bg-vermelho text-white' : 'text-vermelho' !!}" wire:click="setSearch(null, '{{ $reg }}')">{{ $reg }}</a>
                    @endforeach

                    @if ($region)
                        <div class="my-3 md:my-5 text-lg md:text-xl lg:text-2xl xl:text-3xl">
                            @foreach ($places as $place)
                                <a class="hover:bg-vermelho hover:text-white px-1 lg:px-2 {!! $filters['place'] == $place ? 'bg-vermelho text-white' : 'text-vermelho' !!}" wire:click="setSearch(null, null, '{{ $place }}')">{{ $place }}</a>
                            @endforeach
                        </div>   
                    @endif
                </div>
            @endif

            @if ($filters['type'] == 'category')
                <div class="my-3 md:my-5 text-lg md:text-xl lg:text-2xl xl:text-3xl">
                    @foreach ($categories as $category)
                    @if ($category->id != 6)
                        <a class="inline-block px-0.5 lg:px-1 border-4 {!! $filters['value'] == $category->name ? ' border-azul' : 'border-white' !!}" wire:click="setSearch(null, '{{ $category->name }}')"><img class="h-[50px] sm:h-[70px] md:h-[100px] lg:h-[120px]" src="{{ asset('images/icons/categories/' . $category->slug . '.svg') }}" alt="{{ $category->name }}"></a>
                    @else
                        <a href="{{ route('programacao-infantil') }}" class="inline-block px-0.5 lg:px-1 border-4 {!! $filters['value'] == $category->name ? ' border-azul' : 'border-white' !!}"><img class="h-[50px] sm:h-[70px] md:h-[100px] lg:h-[120px]" src="{{ asset('images/icons/categories/' . $category->slug . '.svg') }}" alt="{{ $category->name }}"></a>
                    @endif
                @endforeach
                </div>
            @endif

            @if ($filters['type'] == 'date')
                <div class="my-3 md:my-5 text-base md:text-lg lg:text-xl xl:text-2xl">
                    <?php 
                        $days = array('01', '02','03', '04', '05', '06', '07', '08', '09', '10', '11', '12','13', '14', '15', '16', '17', '18', '19', '20', '21', '22','23', '24', '25', '26', '27', '28', '29', '30', '31'  );
                    ?>
                    @foreach ($days as $day)
                        <a class="hover:bg-azul-m hover:text-white px-0.5 lg:px-1 {!! $filters['value'] == $day ? 'bg-azul-m text-white' : 'text-azul-m' !!}" wire:click="setSearch(null, '{{ $day }}')">{{ $day }}/07</a>
                    @endforeach
                
                </div>
            @endif

            <div class="my-3 md:my-5 text-lg md:text-xl lg:text-2xl xl:text-3xl text-black">
                <?php 
                    // var_dump($filters);
                    // var_dump($region);
                    // var_dump($categories);
                ?>
            </div>
        </div>
    </div>

    <div id="items" class="my-6">
        @if (count($items) > 0)
            @foreach($items as $item)
            <div class="md:grid md:grid-cols-3 md:gap-4 mb-8">
                <div class="">
                    <img src="{{ url("storage/agendas/$item->image") }}" alt="{{ $item->title }}" class="w-full ">
                </div>
                <div class="md:col-span-2">
                    <span class="text-sm font-bld">{{ \Carbon\Carbon::parse($item->date)->format('d/m/Y') }} às {{ \Carbon\Carbon::parse($item->date)->format('H:i') }}h</span>
                    <span class="font-bld text-2xl block mb-3">{{ $item->title }}</span>

                    <div class="">

                        <img src="{{ asset("images/icons/categories/" . $item->category->slug . ".svg") }}" alt="{{ $item->title }}" class="h-20 float-right ml-2 mb-2">

                        {!! preg_replace('#(<[a-z ]*)(style=("|\')(.*?)("|\'))([a-z ]*>)#', '\\1\\6', $item->info) !!}

                        <?php
                            $performers = array();
                            foreach ($item->performers as $performer){
                                array_push($performers,  $performer->name);
                            }
                        ?>
                        @if (count($performers) > 0)
                            <p class="my-3"><span class="font-bld text-lg">Elenco:</span> {{ implode(", ", $performers) }}</p>
                        @endif
                    </div>

                    <div class="my-3">
                        <span class="font-bld text-lg">{{ $item->place->title }}</span>
                        <div class="text-sm">{!! $item->place->services !!}</div>
                    </div>
                    @if ($item->pago == 1)
                        <a href="{{ $item->link_pago }}" target="_blank"><img src="{{ asset("images/btn.png") }}" alt="{{ $item->title }}" class="my-3 float-left"></a>
                    @endif

                    
                        
                </div>
            </div>
            @endforeach

            <div class="pagination">
                {{ $items->links() }}
            </div>
        @else
            <p class="text-xl text-center">Nenhum espetáculo encontrado</p>
        @endif


        
    </div>
</div>
