<div class="flex space-x-1 justify-around">
    <button wire:click="$emitTo('agenda.edit', 'toogleDestaque', {{ $id }})" title="Destacar" wire:loading.attr="disabled">
        @if ($destaque == 1)
            <span class="text-emerald-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </span>
        @else
            <span class="text-gray-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </span>
        @endif
    </button>
</div>