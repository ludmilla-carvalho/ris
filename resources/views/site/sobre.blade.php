<x-site-layout>
    <div>
        <h1 class="text-white text-3xl lg:text-4xl font-bold">Sobre o Festival</h1>

        <div id="sobre">
            {!! $page->text->text !!}
        </div>
        
    </div>
    <div class="my-3 lg:my-8">
        <div class="aspect-w-16 aspect-h-9">
            {!! $page->video->embed !!}
        </div>
    </div>
</x-site-layout>