<div class="space-y-6">

    <div class="flex flex-col">
        <h2 class="mx-auto text-black text-2xl uppercase tracking-wide">{{ __('pages.home.best-cars.title') }}</h2>
        <p class="mx-auto text-black text-xl font-light tracking-wide">{{ __('pages.home.best-cars.subtitle') }}</p>
    </div>

    @if($carros)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($carros as $carro)
                <x-car.card :carro="$carro"></x-car.card>
            @endforeach
        </div>
    @else
        <div class="flex flex-col">
            <h1 class="mx-auto text-2xl font-bold text-black">{{ __('pages.home.best-cars.not_found') }}</h1>
        </div>
    @endif

    @if($carros)
        <div class="flex justify-center">
            <x-button :href="route('car.index')">{{ __('pages.home.best-cars.button') }}</x-button>
        </div>
    @endif

</div>
