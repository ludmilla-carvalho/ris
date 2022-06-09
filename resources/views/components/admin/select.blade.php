{{-- block w-full text-sm dark:border-gray-600 dark:bg-gray-700 dark:focus:border-gray-500 focus:border-azul-400 focus:outline-none dark:text-gray-300 form-select
    
    style="width:100%
--}}
@props(['disabled' => false, 'options' => array(), 'action' => null])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-orange-300 without-ring rounded-md shadow-sm text-gray-600 w-full']) !!}>
    @if ($action == 'create')
        <option value="">Selecione...</option>
    @endif
    @foreach ($options as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>

