<div>
    <x-admin.modal :value="$comp" wire:model="open">
        <div class="px-6 pt-4">
            <div class="text-xl text-gray-900">
                Adicionar {{ isset($name) ? $name : '' }}
            </div>
        </div>
        <div class="xmt-4 xtext-gray-600 xtext-lg">
            <div class="px-6 pt-4 pb-8">
                <div class="grid grid-cols-6 gap-6">
                    {{-- fields --}}
                    @include('admin.performers.form', ['performer' => $performer, 'action' => 'create', 'image' => $image, 'iteration' => $iteration])
                </div>
            </div>

            <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right">
                <x-jet-secondary-button x-on:click="open = false" x-bind:disabled="working">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
        
                <x-jet-button class="ml-3" wire:click="save">
                    {{ __('Save') }}
                </x-jet-button>
            </div>
        </div>
    </x-admin.modal>
</div>

