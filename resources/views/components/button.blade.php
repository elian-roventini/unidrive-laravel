@props(['outline' => false])

@php
    $className = 'inline-flex items-center px-4 py-2 bg-orange rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:border-orange-dark disabled:opacity-25 transition ease-in-out duration-150';
    
    if(!$outline) $className .= ' border border-transparent hover:bg-orange-light active:bg-orange-dark';
    if($outline) $className .= ' bg-transparent border border-white hover:border-orange-light hover:text-orange focus:text-orange-dark active:text-orange-dark';
@endphp

<button {{ $attributes->merge(['type' => 'submit', 'class' => $className]) }}>
    {{ $slot }}
</button>
