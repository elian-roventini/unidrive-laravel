<div class="space-y-6">

    <div>
        <h2 class="text-black text-2xl uppercase tracking-wide">Veículos Em alta</h2>
        <p class="text-black text-xl font-light tracking-wide">Os veículos mais procurados disponiveis para você!</p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse($carros as $carro)
            <x-car.card :carro="$carro" />
        @empty
            <h1 class="text-2xl font-bold text-black">Não existem carros cadastrados</h1>
        @endforelse
    </div>

    @if($carros)
        <div class="flex justify-center">
            <x-button :href="route('car.index')">Ver Mais</x-button>
        </div>
    @endif

</div>
