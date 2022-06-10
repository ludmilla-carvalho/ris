@php
$maxWidth = 'sm:max-w-2xl';

// $maxWidth = [
//     'sm' => 'sm:max-w-sm',
//     'md' => 'sm:max-w-md',
//     'lg' => 'sm:max-w-lg',
//     'xl' => 'sm:max-w-xl',
//     '2xl' => 'sm:max-w-2xl',
// ][$maxWidth ?? '2xl'];
@endphp

<div 
    x-data="{ 
        open: {{ isset($open) && $open ? 'true' : 'false' }}, 
        working: false,
        focusables() {
            // All focusable element types...
            let selector = 'a, button, input:not([type=\'hidden\']), textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'

            return [...$el.querySelectorAll(selector)]
                // All non-disabled elements...
                .filter(el => ! el.hasAttribute('disabled'))
        },
        firstFocusable() { return this.focusables()[0] },
        lastFocusable() { return this.focusables().slice(-1)[0] },
        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 }
    }" 
    x-on:close.stop="open = false"
    x-on:keydown.escape.window="open = false"
    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
    x-cloak wire:key="delete-{{ $value }}"
>
    <span x-on:click="open = true">
        <button class="p-1 text-red-600 rounded hover:bg-red-600 hover:text-white"><x-icons.trash /></button>
    </span>

    <div x-show="open" class="jetstream-modal fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50" style="display: none">
        
        <div x-show="open" class="fixed inset-0 transform transition-all" 
            x-on:click="open = false" 
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div x-show="open" class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full {{ $maxWidth }} sm:mx-auto"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">

            <div class="px-6 py-4">
                <div class="text-lg text-gray-900">
                    {{ __('Delete') }} #{{ $value }}
                </div>
        
                <div class="mt-4 text-gray-600 text-lg">
                    Deseja mesmo excluir o registro <b>{{ $item }}</b>?
                </div>
            </div>
        
            <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right">
                <x-jet-secondary-button x-on:click="open = false" x-bind:disabled="working">
                    {{ __('No') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-3" wire:click="delete({{ $value }})">
                    {{ __('Yes') }}
                </x-jet-button>

            </div>

        </div>
    </div>
</div>
