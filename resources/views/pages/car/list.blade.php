<section id="cars" class="text-black w-full mx-auto px-10 grow">
    @if($carros === [])
        <h1 class="text-2xl font-bold">Não existem carros cadastrados</h1>
    @endif

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($carros as $carro)
            <x-car.card
                :image="$carro['image'] ?? ''"
                :name="$carro['name'] ?? ''"
                :price="$carro['price'] ?? ''"
                :description="$carro['description'] ?? ''"
                :date="$carro['date'] ?? ''"
                :place="$carro['place'] ?? ''"
                :distance="$carro['distance'] ?? ''"
            />
        @endforeach
    </div>

    @if($carros)
        <div class="flex justify-center mt-4">
            <x-button :href="route('car.index')">Ver Mais</x-button>
        </div>
    @endif
</section>
