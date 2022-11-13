@props([
    'carro' => null
])

<div class="flex justify-center text-black">
    <div class="rounded-lg shadow-lg bg-blue-dark max-w-sm">
        <a href="{{ route('car.show', $carro->modelo) ?? '' }}">
            <img class="rounded-t-lg" src="{{ $carro->imagem ?? 'https://www.cnnbrasil.com.br/wp-content/uploads/sites/12/2021/11/VW-Gol.jpg?w=876&h=484&crop=1' }}" alt="Foto do carro"/>
        </a>
        <div class="px-4">
            <div class="flex justify-between py-6">
                <a href="{{ route('car.show', $carro->modelo) }}">
                    <h5 class="text-md font-bold uppercase text-white">{{ $carro->modelo ?? '' }}</h5>
                </a>
                <p class="text-md font-bold text-orange">{{ $carro->valor ?? '' }}</p>
            </div>
            <div class="py-3 border-t border-gray-800">
                <p class="text-sm font-thin text-gray-400">{{ $carro->descricao ?? '' }}</p>
                <div class="flex justify-between mt-2">
                    <p class="text-xs font-thin text-gray-500">{{ $carro->ano ?? '' }}</p>
                    <p class="text-xs font-thin text-gray-500">{{ $carro->lugar ?? '' }}</p>
                    <p class="text-xs font-thin text-gray-500">{{ $carro->quilometragem ?? '' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
