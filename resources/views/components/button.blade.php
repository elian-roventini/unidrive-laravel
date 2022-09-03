@props(['outline' => false])

@php
    $class = ['inline-flex', 'items-center', 'px-4', 'py-2', 'bg-orange', 'rounded-md', 'font-semibold', 'text-xs', 'uppercase', 'tracking-widest', 'focus:outline-none', 'focus:border-orange-dark', 'disabled:opacity-25', 'transition', 'ease-in-out', 'duration-150'];

    $class[] = $outline
                ? ' bg-transparent border border-white hover:border-orange-light hover:text-orange focus:text-orange-dark active:text-orange-dark'
                : ' border border-transparent hover:bg-orange-light active:bg-orange-dark';
@endphp

<a {{ $attributes->class($class) }}>
    {{ $slot }}
</a>
