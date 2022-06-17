<!-- agenda -->
<div class="col-span-6">
    <x-jet-label for="agenda.title" value="Título" />
    <x-jet-input id="{{ $action }}_agenda.title" type="text" class="mt-1 block w-full" wire:model="agenda.title" />
    <x-jet-input-error for="agenda.title" class="mt-2" />
</div>

<div class="col-span-6">
    <x-jet-label for="agenda.date" value="Data" />
    <x-admin.datetime id="{{ $action }}_agenda.date" type="text" class="block" wire:model.deffer="agenda.date" />
    <x-jet-input-error for="agenda.date" class="mt-2" />
</div>

<div class="col-span-6">
    <x-jet-label for="agenda.place_id" value="Local" />
    <div wire:ignore>
        <x-admin.select id="{{ $action }}_agenda_place_id" class="block" wire:model="agenda.place_id" :options="$places" :action="$action"/>
    </div>
    <x-jet-input-error for="agenda.place_id" class="mt-2" />
</div>

<div class="col-span-6">
    <x-jet-label for="agenda.category_id" value="Categoria" />
    <div wire:ignore>
        <x-admin.select id="{{ $action }}_agenda_category_id" class="block" wire:model="agenda.category_id" :options="$categories" :action="$action"/>
    </div>
    <x-jet-input-error for="agenda.category_id" class="mt-2" />
</div>

<div class="col-span-6">
    <x-jet-label for="selPerformer" value="Artistas" />
    <div wire:ignore>
        <x-admin.select id="{{ $action }}_agenda_selPerformer" class="block" wire:model="selPerformers" :options="$performers" :action="$action" multiple/>
    </div>
    <x-jet-input-error for="selPerformer" class="mt-2" />
</div>

<div class="col-span-6">
    <x-jet-label for="image" value="Imagem" />
    @if (strlen($agenda->image) > 3)
        <a href="{{ url("storage/agendas/$agenda->image") }}" target="_blank"><img src="{{ url("storage/agendas/$agenda->image") }}" class="w-20"></a>
    @endif
    <x-jet-input id="{{ $action }}_agenda.image{{ $iteration }}" type="file" class="mt-1 block w-full" wire:model="image" />
    <x-jet-input-error for="image" class="mt-2" />
    <p class="text-xs">Até 2MB</p>
    <p class="text-xs">Formatos: png, jpg e gif</p>
    <p class="text-xs">Compressão de imagens: <a href="https://www.iloveimg.com/compress-image" class="text-orange-500">https://www.iloveimg.com/compress-image</a></p>
</div>

<div class="col-span-6 mt-3">
    <x-jet-checkbox id="agenda.destaque" name="agenda.destaque" wire:model.deffer="agenda.destaque"/>
    <span class="ml-1 text-sm">Destaque na home</span>
    <p class="text-xs">Exibe o banner na home</p>
</div>

<div class="col-span-6">
    <x-jet-label for="banner" value="Banner" />
    @if (strlen($agenda->banner) > 3)
        <a href="{{ url("storage/agendas/$agenda->banner") }}" target="_blank"><img src="{{ url("storage/agendas/$agenda->banner") }}" class="w-20"></a>
    @endif
    <x-jet-input id="{{ $action }}_agenda.banner{{ $iteration }}" type="file" class="mt-1 block w-full" wire:model="banner" />
    <x-jet-input-error for="banner" class="mt-2" />
    <p class="text-xs">Até 2MB</p>
    <p class="text-xs">Formatos: png, jpg e gif</p>
    <p class="text-xs">Compressão de imagens: <a href="https://www.iloveimg.com/compress-image" class="text-orange-500">https://www.iloveimg.com/compress-image</a></p>
</div>

<div class="col-span-6">
    <x-jet-label for="banner_mobile" value="Banner Mobile" />
    @if (strlen($agenda->banner_mobile) > 3)
        <a href="{{ url("storage/agendas/$agenda->banner_mobile") }}" target="_blank"><img src="{{ url("storage/agendas/$agenda->banner_mobile") }}" class="w-20"></a>
    @endif
    <x-jet-input id="{{ $action }}_agenda.banner_mobile{{ $iteration }}" type="file" class="mt-1 block w-full" wire:model="banner_mobile" />
    <x-jet-input-error for="banner_mobile" class="mt-2" />
    <p class="text-xs">Até 2MB</p>
    <p class="text-xs">Formatos: png, jpg e gif</p>
    <p class="text-xs">Compressão de imagens: <a href="https://www.iloveimg.com/compress-image" class="text-orange-500">https://www.iloveimg.com/compress-image</a></p>
</div>

{{-- https://quilljs.com/docs/modules/toolbar/ --}}
<!-- agenda.info -->
<div class="col-span-6">
    <x-jet-label for="agenda.info" value="Info" />
    <div class="mt-2 bg-white" id="{{ $action }}_place.info">
        <div
            class="h-64"
            x-data
            x-ref="quillEditor"
            x-init="
            quill = new Quill($refs.quillEditor, {
                theme: 'snow',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],
                        ['link'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        ['clean'] 
                    ]
                  },
            });
            quill.on('text-change', function () {
                $dispatch('quill-input', quill.root.innerHTML);
            });
            "
            x-on:quill-input.debounce.500ms="@this.set('agenda.info', $event.detail)" wire:model="agenda.info"
        >
            {!! $agenda->info  !!}
        </div>
        <x-jet-input-error for="agenda.info" class="mt-2" />
    </div>

    <div class="col-span-6 mt-3">
        <x-jet-checkbox id="agenda.pago" name="agenda.pago" wire:model.deffer="agenda.pago"/>
        <span class="ml-1 text-sm">Evento pago</span>
    </div>

    <div class="col-span-6 mt-3">
        <x-jet-label for="agenda.link_pago" value="Link para compra" />
        <x-jet-input id="{{ $action }}_agenda.link_pago" type="text" class="mt-1 block w-full" wire:model="agenda.link_pago" />
        <x-jet-input-error for="agenda.link_pago" class="mt-2" />
    </div>

    <div class="col-span-6 mt-3">
        <x-jet-checkbox id="agenda.active" name="agenda.active" wire:model.deffer="agenda.active"/>
        <span class="ml-1 text-sm">Ativo</span>
        <p class="text-xs">Exibe na programação</p>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function () {
        //Performers
        $('#{{ $action }}_agenda_selPerformer').select2({
            placeholder: 'Selecione um ou mais artistas'
        });
        $('#{{ $action }}_agenda_selPerformer').on('change', function (e) {
            let data = $(this).val();
            @this.set('selPerformers', data);
        });
        window.livewire.on('clearPerformers', () => {
            $("#{{ $action }}_agenda_selPerformer").select2({
                placeholder: 'Selecione um ou mais artistas'
            });
        });

        // Place
        // $('#{{ $action }}_agenda_place_id').select2({
        //     placeholder: 'Selecione um local'
        // });
        // $('#{{ $action }}_agenda_place_id').on('change', function (e) {
        //     let data = $(this).val();
        //     @this.set('agenda.place_id', data);
        // });
        // window.livewire.on('clearPlaces', () => {
        //     $("#{{ $action }}_agenda_place_id").select2({
        //         placeholder: 'Selecione um local'
        //     });
        // });
    });
</script>
@endpush

