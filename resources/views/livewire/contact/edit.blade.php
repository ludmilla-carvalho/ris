<div class="max-w-7xl mx-auto pb-4 text-gray-800 relative">
    <div class="max-w-7xl mx-auto pb-4 xpy-10 xsm:px-6 xlg:px-8">
        <x-jet-form-section submit="save">
            <x-slot name="title" class="text-white">
                Informações de Contato
            </x-slot>
        
            <x-slot name="description">
                Atualize as informações de contato
            </x-slot>
        
            <x-slot name="form">
                <div class="col-span-6 sm:col-span-5">
                    <x-jet-label for="contact.email" value="E-mail" />
                    <x-jet-input id="contact.email" type="text" class="mt-1 block w-full" wire:model="contact.email" />
                    <x-jet-input-error for="contact.email" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-5">
                    <x-jet-label for="contact.email_press" value="E-mail assessoria de imprensa" />
                    <x-jet-input id="contact.email_press" type="text" class="mt-1 block w-full" wire:model="contact.email_press" />
                    <x-jet-input-error for="contact.email_press" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-5">
                    <x-jet-label for="contact.phone_press" value="Telefone assessoria de imprensa" />
                    <x-jet-input id="contact.phone_press" type="text" class="mt-1 block w-full" wire:model="contact.phone_press" />
                    <x-jet-input-error for="contact.phone_press" class="mt-2" />
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
    