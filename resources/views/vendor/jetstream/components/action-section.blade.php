{{-- md:grid md:grid-cols-3 md:gap-6 --}}
<div {{ $attributes->merge(['class' => '']) }}>
    <x-jet-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-jet-section-title>

    {{-- md:mt-0 md:col-span-2 --}}
    <div class="mt-5">
        <div class="p-6 bg-white shadow rounded-lg">
            {{ $content }}
        </div>
    </div>
</div>
