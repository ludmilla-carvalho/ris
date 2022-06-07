@props(['active'])
@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-orange-500 text-base font-medium text-orange-500 focus:outline-none transition'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-white hover:text-white hover:border-white focus:outline-none transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
