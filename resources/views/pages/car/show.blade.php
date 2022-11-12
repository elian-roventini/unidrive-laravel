@extends('layouts.app')

@section('title', 'Carros')

@section('content')
    <div class="bg-white text-black p-8 my-4 mx-auto">
        <h1 class="text-2xl tracking-wider font-bold uppercase mb-6">{{ $car['name'] }}</h1>

        <div class="flex flex-col md:flex-row">
            <div class="grow md:mr-8">
                @include('pages.car.gallery')

                <div class="bg-blue-dark rounded-lg mt-8">
                    <div class="p-4 md:flex md:flex-wrap justify-between">
                        <h2 class="text-white text-xl font-bold">{{ $car['name'] }}</h2>
                        <h3 class="text-orange">{{ $car['price'] }}</h3>
                    </div>

                    <hr>

                    <div class="p-4 md:flex md:flex-wrap md:space-x-4">
                        <p class="text-white">Lugar <small class="font-bold">{{ $car['place'] }}</small></p>
                        <p class="text-white">Ano <small class="font-bold">{{ $car['date'] }}</small></p>
                        <p class="text-white">KM <small class="font-bold">{{ $car['distance'] }}</small></p>
                        <p class="text-white">Versão <small class="font-bold">{{ $car['description'] }}</small></p>
                    </div>
                </div>

                <div class="bg-blue-dark rounded-lg mt-8">
                    <h2 class="text-white text-xl p-4">Acessórios</h2>

                    <hr>

                    <div class="flex flex-wrap">
                        <ul class="p-4">
                            <li class="text-gray-500">Ar condicionado</li>
                            <li class="text-gray-500">Bancos dianteiros individuais</li>
                            <li class="text-gray-500">Direção elétrica</li>
                        </ul>
                        <ul class="p-4">
                            <li class="text-gray-500">Ar condicionado</li>
                            <li class="text-gray-500">Bancos dianteiros individuais</li>
                            <li class="text-gray-500">Direção elétrica</li>
                        </ul>
                        <ul class="p-4">
                            <li class="text-gray-500">Ar condicionado</li>
                            <li class="text-gray-500">Bancos dianteiros individuais</li>
                            <li class="text-gray-500">Direção elétrica</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="w-fit md:ml-4">
                <div class="flex flex-col border-1 md:px-8 border-1">
                    <x-form.input x-col="md:col-span-6" name="date" placeholder="DD/MM/AAAA" type="date"/>

                    <div class="inline-flex justify-end mt-3">
                        <x-button type="button">Agendar Test Drive</x-button>
                    </div>
                </div>

                <div class="mt-8">
                    <div class="flex flex-col gap-4">
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
                </div>
            </div>
        </div>
    </div>
@endsection
