<div>
    <x-slot name="header">
        <h2 class="font-semibold text-orange-500 text-2xl leading-tight">
            Locais
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-4 text-gray-800 relative">
            <livewire:place.data-table sort="id|desc"/>

            <livewire:place.create/>
            
            <livewire:place.edit />
        </div>
    </div>
</div>

{{-- Usado em create e edit --}}
@push('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endpush
