@php
$maxWidth = 'sm:max-w-2xl';

// $maxWidth = [
//     'sm' => 'sm:max-w-sm',
//     'md' => 'sm:max-w-md',
//     'lg' => 'sm:max-w-lg',
//     'xl' => 'sm:max-w-xl',
//     '2xl' => 'sm:max-w-2xl',
// ][$maxWidth ?? '2xl'];


//open: {{ isset($open) && $open ? 'true' : 'false' }}, 
@endphp
<div>
<div 
    x-data="{ 
        open: @entangle($attributes->wire('model')), 
        working: false ,
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
    {{-- x-init="open = false" --}}
    x-on:close.stop="open = false"
    x-on:keydown.escape.window="open = false"
    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
    x-cloak wire:key="add-{{ $value }}"
>
    {{-- <span x-on:click="open = true">
        {{ $trigger }}
    </span> --}}

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
            {{-- Content --}}
            {{ $slot }}
        </div>
    </div>
</div>
</div>