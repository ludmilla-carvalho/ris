{{-- https://flatpickr.js.org/examples/ --}}

@props(['disabled' => false])

@php
    $options = [
        'dateFormat' => 'Y-m-d H:i',
        'enableTime' => true,
        'altFormat' =>  'd/m/Y H:i',
        'altInput' => true,
        'locale' => 'pt',
    ];
@endphp

<div wire:ignore>
    <input
        x-data="{value: @entangle($attributes->wire('model')), instance: undefined}"
        x-init="() => {
                $watch('value', value => instance.setDate(value, true));
                instance = flatpickr($refs.input, {{ json_encode((object)$options) }});
            }"
        x-ref="input"
        x-bind:value="value"
        type="text"
        {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-orange-300 without-ring rounded-md shadow-sm text-gray-600']) !!}
    />
</div>