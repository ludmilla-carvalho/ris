<div class="max-w-7xl mx-auto pb-4 text-gray-800 relative">
    <div class="max-w-7xl mx-auto pb-4 xpy-10 xsm:px-6 xlg:px-8">
        <x-jet-form-section submit="save">
            <x-slot name="title" class="text-white">
                Informações do Texto
            </x-slot>
        
            <x-slot name="description">
                Atualize as informações do texto
            </x-slot>
        
            <x-slot name="form">
                <div class="col-span-6 sm:col-span-5 text-gray-700">
                    <x-jet-label for="text.text" value="Texto" />
                    <div class="mt-2 bg-white" id="text.text">
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
                            x-on:quill-input.debounce.500ms="@this.set('text.text', $event.detail)" wire:model="text.text"
                        >
                            {!! $text->text  !!}
                        </div>
                        <x-jet-input-error for="text.text" class="mt-2" />
                    </div>
                    <x-jet-input-error for="text.text" class="mt-2" />
                </div>

                <div class="col-span-6 mt-3">
                    <x-jet-checkbox id="text.active" name="text.active" wire:model.deffer="text.active"/>
                    <span class="ml-1 text-sm">Ativo</span>
                    <p class="text-xs">Exibe na página</p>
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-jet-action-message class="mr-3" on="saved">
                    {{ __('Saved.') }}
                </x-jet-action-message>
        
                <x-jet-button wire:loading.attr="disabled" wire:click="save" >
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>
    </div>
</div>