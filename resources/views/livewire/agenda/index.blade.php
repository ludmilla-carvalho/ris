<div>
    <x-slot name="header">
        <h2 class="font-semibold text-orange-500 text-2xl leading-tight">
            Agenda
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-4 text-gray-800 relative">
            <livewire:agenda.data-table sort="id|desc"/>

            <livewire:agenda.create/>
            
            <livewire:agenda.edit />
        </div>
    </div>
</div>
{{-- Usado em create e edit --}}
@push('styles')
    {{-- Quill --}}
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
     {{-- DatePicker --}}
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@push('scripts')
    {{-- Quill --}}
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    {{-- DatePicker --}}
    <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/pt.js"></script>
@endpush
