<div class="max-w-7xl mx-auto pb-4 text-gray-800 relative">
    <div class="max-w-7xl mx-auto pb-4 xpy-10 xsm:px-6 xlg:px-8">
        <x-jet-form-section submit="save">
            <x-slot name="title" class="text-white">
                Informações do Vídeo
            </x-slot>
        
            <x-slot name="description">
                Atualize as informações do vídeo
            </x-slot>
        
            <x-slot name="form">
                <div class="col-span-6 sm:col-span-5">
                    <x-jet-label for="video.embed" value="Código do Youtube" />
                    <x-admin.textarea id="video.embed" class="mt-1 block w-full" wire:model="video.embed" />
                    <x-jet-input-error for="video.embed" class="mt-2" />
                </div>

                <div class="col-span-6 mt-3">
                    <x-jet-checkbox id="video.active" name="video.active" wire:model.deffer="video.active"/>
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
    