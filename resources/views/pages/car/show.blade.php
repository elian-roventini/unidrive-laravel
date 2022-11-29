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
                        <h3 class="text-orange text-xl font-bold">R$ {{ $carro->valor ?? '' }}</h3>
                    </div>

                    <hr>

                    <div class="p-4 md:flex md:flex-wrap md:space-x-4">
                        <p class="text-white">Concessionaria <small class="font-bold">{{ $carro->concessionaria->nomeFantasia ?? '' }}</small></p>
                        <p class="text-white">Ano <small class="font-bold">{{ $carro->ano ?? '' }}</small></p>
                        <p class="text-white">KM <small class="font-bold">{{ $carro->quilometragem ?? '' }}</small></p>
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
                @auth()
                    @if($carro->concessionaria->id !== auth()->user()->concessionaria_id)
                        <form class="flex flex-col border-1 md:px-8 border-1 gap-4" action="{{ route('schedule.store') }}" method="POST">
                        @csrf

                        <x-form.input x-col="col-span-6" name="date" type="date" min="{{ \Carbon\Carbon::now()->addDay()->format('Y-m-d') }}" max="{{ \Carbon\Carbon::now()->addYear()->format('Y-m-d') }}" required>Data</x-form.input>
                        <x-form.input x-col="col-span-6" name="initial_time" type="time" min="08:00" max="18:00" required>Hora Inicial</x-form.input>
                        <x-form.input x-col="col-span-6" name="final_time" type="time" min="08:00" max="18:00" required>Hora Final</x-form.input>

                        <input type="hidden" name="carro" value="{{ $carro->id }}">

                        <div class="inline-flex justify-end">
                            <x-button type="button">Agendar Test Drive</x-button>
                        </div>
                    </form>
                    @endif
                @endauth
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

@push('scripts')
<script>
    $(function() {
        $('input[name="date"]').daterangepicker({
            timePicker: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
                format: 'D/M/Y HH:MM'
            }
        });
    });
</script>
@endpush
