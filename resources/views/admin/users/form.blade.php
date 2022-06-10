<!-- user.name -->
<div class="col-span-6">
    <x-jet-label for="user.name" value="Nome" />
    <x-jet-input id="{{ $action }}_user.name" type="text" class="mt-1 block w-full" wire:model="user.name" />
    <x-jet-input-error for="user.name" class="mt-2" />
</div>

<!-- user.name -->
<div class="col-span-6">
    <x-jet-label for="user.email" value="E-mail" />
    <x-jet-input id="{{ $action }}_user.email" type="email" class="mt-1 block w-full" wire:model="user.email" />
    <x-jet-input-error for="user.email" class="mt-2" />
</div>


<!-- user.name -->
<div class="col-span-6">
    <x-jet-label for="user.password" value="Senha" />
    <x-jet-input id="{{ $action }}_user.password" type="password" class="mt-1 block w-full" wire:model="user.password" />
    <x-jet-input-error for="user.password" class="mt-2" />
</div>

