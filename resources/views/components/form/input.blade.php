@props([
    "placeholder" => "",
    "value" => "",
    "example" => "",
])

@php
    $default_class = '
        mt-3
        form-control
        block
        w-full
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding
        border border-solid border-gray-300
        rounded
        transition
        ease-in-out
        m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
    ';

@endphp

<div class="{{ $attributes['x-col'] }}">
    <label for="{{ $attributes['name'] }}">
        @if($slot->isNotEmpty())
            <span class="inline-block">{{ $slot }}</span>
        @endif
        <input
            {{ $attributes->merge([
                'type' => 'text',
                'class' => $default_class,
                'placeholder' => $placeholder
            ]) }}
            value="{{ old($attributes['name']) }}"
        />
    </label>

    @error($attributes['name'])
        <small class="text-red-500 alert alert-danger">{{ $message }}</small>
    @enderror

    @if($attributes['x-example'])
        <small class="col-span-6 small text-orange">Ex: {{ $attributes['x-example'] }}</small>
    @endif
</div>
