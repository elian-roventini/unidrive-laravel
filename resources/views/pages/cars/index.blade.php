@extends('layouts.app')

@section('title', 'Carros')

@section('content')
    <div class="container mx-auto p-8">
        <h1 class="my-3 text-2xl text-black uppercase font-semibold">Pesquisar Carros</h1>
        <div class="flex-row md:flex">
            <div class="grid justify-items-center md:w-1/3 h-fit">
                <x-card class="p-6">
                    <x-form.input placeholder='Pesquisar Nome' />
                    <div class="grid gap-4 lg:grid-cols-2">
                        <x-form.select>Marca</x-form.select>
                        <x-form.select>Modelo</x-form.select>
                    </div>
                    <div class="grid gap-4 lg:grid-cols-2">
                        <x-form.select>Ano</x-form.select>
                        <x-form.select>Cor</x-form.select>
                    </div>
                    <div class="grid gap-4 lg:grid-cols-2">
                        <x-form.select>Cidade</x-form.select>
                        <x-form.select>Estado</x-form.select>
                    </div>

                    <div class="flex justify-around">
                        <x-button outline>Limpar</x-button>
                        <x-button>Filtrar</x-button>
                    </div>
                </x-card>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 my-8 md:my-0 justify-items-center md:w-2/3 gap-4">
                @for($i = 0; $i < 10; $i++)
                    <x-car.card />
                @endfor
            </div>
        </div>
    </div>
@endsection
