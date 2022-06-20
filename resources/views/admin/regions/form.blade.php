<!-- region -->
<div class="col-span-6">
    <x-jet-label for="region.title" value="Região" />
    <x-jet-input id="{{ $action }}_region.title" type="text" class="mt-1 block w-full" wire:model="region.title" />
    <x-jet-input-error for="region.title" class="mt-2" />
</div>

{{-- <div class="col-span-6">
    <x-jet-checkbox id="region.active" name="region.active" wire:model.deffer="region.active"/>
    <span class="ml-1 text-sm">Ativo</span>
    <p class="text-xs">Exibe na busca da programação</p>
</div> --}}