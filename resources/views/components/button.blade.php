@props([
    'outline' => false,
    'type' => ''
])

@php
    $class = ['inline-flex', 'items-center', 'px-4', 'py-2', 'bg-orange', 'rounded-md', 'font-semibold', 'text-xs', 'uppercase', 'tracking-widest', 'focus:outline-none', 'focus:border-orange-dark', 'disabled:opacity-25', 'transition', 'ease-in-out', 'duration-150'];

    $class[] = $outline
                ? ' bg-transparent border border-white hover:border-orange-light hover:text-orange focus:text-orange-dark active:text-orange-dark'
                : ' border border-transparent hover:bg-orange-light active:bg-orange-dark';
@endphp

@if($type === "button")
    <button {{ $attributes->merge([
        'class' => implode(' ', $class)
    ]) }}>
        {{ $slot }}
    </button>
@else
    <a
        {{ $attributes->merge([
            'class' => implode(' ', $class)
        ]) }}
    >
        {{ $slot }}
    </a>
@endif

