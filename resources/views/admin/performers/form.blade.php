<!-- performer -->
<div class="col-span-6">
    <x-jet-label for="performer.name" value="Nome" />
    <x-jet-input id="{{ $action }}_performer.name" type="text" class="mt-1 block w-full" wire:model="performer.name" />
    <x-jet-input-error for="performer.name" class="mt-2" />
</div>

<div class="col-span-6">
    <x-jet-label for="image" value="Imagem" />
    @if (strlen($performer->image) > 3)
        <a href="{{ url("storage/performers/$performer->image") }}" target="_blank"><img src="{{ url("storage/performers/$performer->image") }}" class="w-20"></a>
    @endif
    <x-jet-input id="{{ $action }}_performer.image{{ $iteration }}" type="file" class="mt-1 block w-full" wire:model="image" />
    <x-jet-input-error for="image" class="mt-2" />
    <p class="text-xs">Até 2MB</p>
    <p class="text-xs">Formatos: png, jpg e gif</p>
    <p class="text-xs">Compressão de imagens: <a href="https://www.iloveimg.com/compress-image" class="text-orange-500">https://www.iloveimg.com/compress-image</a></p>
</div>


{{-- https://quilljs.com/docs/modules/toolbar/ --}}
<!-- performer.bio -->
<div class="col-span-6">
    <x-jet-label for="performer.bio" value="Bio" />
    <div class="mt-2 bg-white" id="{{ $action }}_place.bio">
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
            x-on:quill-input.debounce.500ms="@this.set('performer.bio', $event.detail)" wire:model="performer.bio"
        >
            {!! $performer->bio !!}
        </div>
        <x-jet-input-error for="performer.bio" class="mt-2" />
    </div>
</div>

