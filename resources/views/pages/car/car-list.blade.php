<section id="cars" class="text-black w-full mx-auto px-10 grow">
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
</section>
