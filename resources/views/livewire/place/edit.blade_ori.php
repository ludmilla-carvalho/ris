<div>
    teste
    <x-admin.modal :value="$place_id" wire:model="open">
        <x-slot name="trigger">
            {{-- <button class="p-1 text-sky-500 hover:bg-sky-500 hover:text-white rounded" wire:click.prevent="show({{ $place_id }})">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
            </button> --}}
        </x-slot>

        <div class="px-6 pt-4">
            <div class="text-xl text-gray-900">
                Editar {{ isset($name) ? $name : '' }}
            </div>
        </div>
        <div class="xmt-4 xtext-gray-600 xtext-lg">
            <div class="px-6 pt-4 pb-8">
                <div class="grid grid-cols-6 gap-6">
                    {{-- fields --}}
                    {{-- @include('admin.places.form', ['place' => $place, 'regions' => $regions, 'action' => 'edit']) --}}
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
