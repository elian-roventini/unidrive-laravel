@php
    $default_class = '
        w-4
        h-4
        mr-2
        bg-gray-100
        rounded
        border-gray-300
        focus:ring-blue-500
    ';
    $error_class = '
        w-4
        h-4
        mr-2
        bg-gray-100
        rounded
        border-red-500
        focus:ring-red-500
        focus:ring-2
    ';

@endphp

<div class="{{ $attributes['x-col'] }}">
    <input
        @error($attributes['name'])
            {{ $attributes->merge([ 'class' => $error_class ]) }}
        @else
            {{ $attributes->merge([ 'class' => $default_class ]) }}
        @enderror
        type="checkbox"
    />
</div>
