<div x-data="{range_value:50}" class="flex gap-4 pb-2">
    <x-form.input x-model="range_value" >{{ $slot }}</x-form.input>

    <input {{ $attributes->merge([
        'type' => 'range', 
        'class' => 'w-full',
        'x-model' => 'range_value', 
        'min' => '0', 
        'max' => '100', 
        'step' => '1'
    ]) }}>
</div>