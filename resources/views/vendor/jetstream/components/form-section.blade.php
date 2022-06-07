@props(['submit'])
{{-- md:grid md:grid-cols-3 md:gap-6 --}}
<div {{ $attributes->merge(['class' => '']) }}>
    <x-jet-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-jet-section-title>

    {{-- md:mt-0 md:col-span-2 --}}
    <div class="mt-5">
        <form wire:submit.prevent="{{ $submit }}">
            <div class="bg-white p-6 shadow {{ isset($actions) ? 'rounded-tl-md rounded-tr-md' : 'rounded-md' }}">
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center pb-6 px-6 justify-end bg-gray-50 text-right shadow rounded-bl-md rounded-br-md">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
