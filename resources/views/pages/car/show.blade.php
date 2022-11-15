@extends('layouts.app')

@section('title', 'Carros')

@section('content')
    <div class="bg-white text-black p-8 mx-auto">

        <x-message.success />
        <x-message.error />

        <div class="flex flex-col md:flex-row">
            <div class="grow md:mr-8">
                @include('pages.car.gallery')

                <div class="bg-blue-dark rounded-lg mt-8">
                    <div class="p-4 md:flex md:flex-wrap justify-between">
                        <h2 class="text-white text-xl font-bold">{{ $carro->marca ?? '' }} {{ $carro->modelo ?? '' }}</h2>
                        <h3 class="text-orange">{{ $carro->valor ?? '' }}</h3>
                    </div>

                    <hr>

                    <div class="p-4 md:flex md:flex-wrap md:space-x-4">
                        <p class="text-white">Lugar <small class="font-bold">{{ $carro->lugar ?? '' }}</small></p>
                        <p class="text-white">Ano <small class="font-bold">{{ $carro->ano ?? '' }}</small></p>
                        <p class="text-white">KM <small class="font-bold">{{ $carro->quilometragem ?? '' }}</small></p>
                        <p class="text-white">Versão <small class="font-bold">{{ $carro->descricao ?? '' }}</small></p>
                    </div>
                </div>

                <div class="bg-blue-dark rounded-lg mt-8">
                    <h2 class="text-white text-xl p-4">Acessórios</h2>

                    <hr>

                    <div class="flex flex-wrap">
                        <ul class="p-4">
                            @forelse([] as $acessorio)
                                <li class="text-gray-500">Ar condicionado</li>
                            @empty
                                <li class="text-gray-500">Não existem acessórios cadastrados</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <div class="w-fit md:ml-4">
                <form class="flex flex-col border-1 md:px-8 border-1" action="{{ route('schedule.store') }}" method="POST">
                    @csrf

                    <x-form.input x-col="md:col-span-6" name="date" type="date"/>
                    <x-form.input x-col="md:col-span-6" name="initial_time" type="time"/>
                    <x-form.input x-col="md:col-span-6" name="final_time" type="time"/>
                    <input type="hidden" name="carro" value="{{ $carro->modelo }}">

                    <div class="inline-flex justify-end mt-3">
                        <x-button type="button">Agendar Test Drive</x-button>
                    </div>
                </form>

                <div class="mt-8">
                    <h2 class="text-black text-xl p-4 uppercase">Veículos relacionados</h2>
                    
                    <div class="flex flex-col gap-4">
                        @forelse($carros as $carro)
                            <x-car.card :carro="$carro" />
                        @empty
                            <p>Não existem carros cadastrados</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
