@props(['disabled' => false, 'options' => array(), 'text' => ''])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-orange-300 without-ring rounded-md shadow-sm text-gray-600 w-full']) !!}>{{ $text }}</textarea>
