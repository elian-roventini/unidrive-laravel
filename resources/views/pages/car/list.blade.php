<section id="cars" class="text-black w-full mx-auto px-10 grow">
    @if($carros === [])
        <h1 class="text-2xl font-bold">Não existem carros cadastrados</h1>
    @endif

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($carros as $carro)
            <x-car.card :carro="$carro" />
        @endforeach
    </div>

     @if(count($carros) > 10)
        <div class="flex justify-center mt-4">
            <x-button :href="route('car.index', ['limit' => 0])">Ver Mais</x-button>
        </div>
    @endif
</section>
