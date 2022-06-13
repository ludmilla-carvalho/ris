<div>
    <x-slot name="header">
        <h2 class="font-semibold text-orange-500 text-2xl leading-tight">
            Regiões
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-4 text-gray-800 relative">
            <livewire:region.data-table sort="id|asc"/>

            <livewire:region.create/>
            
            <livewire:region.edit />
        </div>
    </div>
</div>
