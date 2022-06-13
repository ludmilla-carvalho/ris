<!-- place -->
<div class="col-span-6">
    <x-jet-label for="place.title" value="Local" />
    <x-jet-input id="{{ $action }}_place.title" type="text" class="mt-1 block w-full" wire:model="place.title" />
    <x-jet-input-error for="place.title" class="mt-2" />
</div>

<!-- place.region_id -->
<div class="col-span-6">
    <x-jet-label for="place.region_id" value="Região" />
    <x-admin.select id="{{ $action }}_place.region" class="" wire:model="place.region_id" :options="$regions" :action="$action"/>
    <x-jet-input-error for="place.region_id" class="mt-2" />
</div>

{{-- https://quilljs.com/docs/modules/toolbar/ --}}
<!-- place.services -->
<div class="col-span-6">
    <x-jet-label for="place.services" value="Serviço" />
    <div class="mt-2 bg-white" id="{{ $action }}_place.service">
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
            x-on:quill-input.debounce.500ms="@this.set('place.services', $event.detail)" wire:model="place.services"
        >
            {!! $place->services !!}
        </div>
        <x-jet-input-error for="place.services" class="mt-2" />
    </div>
</div>