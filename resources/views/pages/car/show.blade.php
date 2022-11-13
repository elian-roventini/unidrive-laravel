@extends('layouts.app')

@section('title', 'Carros')

@section('content')
    <div class="bg-white text-black p-8 mx-auto">

        <x-message.success />
        <x-message.error />

        <h1 class="text-2xl tracking-wider font-bold uppercase mb-6">{{ $carro['name'] ?? '' }}</h1>

        <div class="flex flex-col md:flex-row">
            <div class="grow md:mr-8">
                @include('pages.car.gallery')

                <div class="bg-blue-dark rounded-lg mt-8">
                    <div class="p-4 md:flex md:flex-wrap justify-between">
                        <h2 class="text-white text-xl font-bold">{{ $carro['name'] ?? '' }}</h2>
                        <h3 class="text-orange">{{ $carro['price'] ?? '' }}</h3>
                    </div>

                    <hr>

                    <div class="p-4 md:flex md:flex-wrap md:space-x-4">
                        <p class="text-white">Lugar <small class="font-bold">{{ $carro['place'] ?? '' }}</small></p>
                        <p class="text-white">Ano <small class="font-bold">{{ $carro['date'] ?? '' }}</small></p>
                        <p class="text-white">KM <small class="font-bold">{{ $carro['distance'] ?? '' }}</small></p>
                        <p class="text-white">Versão <small class="font-bold">{{ $carro['description'] ?? '' }}</small></p>
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
                        @forelse($carros as $carro)
                            <x-car.card
                                :image="$carro['image'] ?? ''"
                                :name="$carro['name'] ?? ''"
                                :price="$carro['price'] ?? ''"
                                :description="$carro['description'] ?? ''"
                                :date="$carro['date'] ?? ''"
                                :place="$carro['place'] ?? ''"
                                :distance="$carro['distance'] ?? ''"
                            />
                        @empty
                            <p>Não existem carros cadastrados</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
