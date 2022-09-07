
<div {{ 
        $attributes->merge([
            'class' => "flex justify-center rounded-lg shadow-lg bg-blue-dark max-w-sm"
        ])
    }}
>
    <div class="">
        {{ $slot }}
    </div>
</div>