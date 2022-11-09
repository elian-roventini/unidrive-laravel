<div class="space-y-6">

    <div>
        <h2 class="text-black text-2xl uppercase tracking-wide">Veículos Em alta</h2>
        <p class="text-black text-xl font-light tracking-wide">Os veículos mais procurados disponiveis para você!</p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($cars as $car)
            <x-car.card
                :image="$car['image']"
                :name="$car['name']"
                :price="$car['price']"
                :description="$car['description']"
                :date="$car['date']"
                :place="$car['place']"
                :distance="$car['distance']"
            />
        @endforeach
    </div>

    <div class="flex justify-center">
        <x-button>Ver Mais</x-button>
    </div>

</div>
