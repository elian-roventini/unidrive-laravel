@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="bg-white text-black p-8 mx-auto">

        <x-message.success />
        <x-message.error />

        <h1 class="text-2xl tracking-wider font-bold uppercase mb-6">Perfil</h1>

        <div class="flex flex-col md:flex-row gap-4">
            <div class="grid md:w-1/2 bg-blue-dark text-white p-4 rounded-lg">
                <h2 class="text-md tracking-wider font-bold uppercase mb-2">Usuário</h2>

                <p class="text-orange font-bold">Nome:</p>
                <p class="">{{ $usuario->nome ?? 'Não Cadastrado' }}</p>

                <p class="text-orange font-bold">E-mail:</p>
                <p class="">{{ $usuario->email ?? 'Não Cadastrado' }}</p>

                <p class="text-orange font-bold">Endereço:</p>
                <p class="">{{ $usuario->endereco ?? 'Não Cadastrado' }}</p>

                <p class="text-orange font-bold">Complemento:</p>
                <p class="">{{ $usuario->complemento ?? 'Não Cadastrado' }}</p>
            </div>

            @if($concessionaria)
                @include('pages.car.create')
            @else
                <div class="grid md:w-1/2 bg-blue-dark text-white p-4 rounded-lg">
                    <x-button href="{{ route('dealership.create') }}" class="w-fit h-16 mx-auto self-center">Cadastrar Concessionária</x-button>
                </div>
            @endif
        </div>

        <div class="py-4"></div>

        <h1 class="text-2xl tracking-wider font-bold uppercase mb-6">Pedidos de TestDrive</h1>

        <div class="flex flex-col md:flex-row gap-4">
            <div class="grid w-full bg-blue-dark text-white p-4 rounded-lg gap-4 overflow-x-auto">
{{--                <div class="text-sm font-medium text-center text-white border-b border-white dark:text-white dark:border-white">--}}
{{--                    <ul class="flex flex-wrap -mb-px">--}}
{{--                        <li class="mr-2">--}}
{{--                            <a href="#" class="inline-block p-4 text-orange rounded-t-lg border-b-2 border-orange active dark:text-orange dark:border-orange" aria-current="page">Solicitações</a>--}}
{{--                        </li>--}}
{{--                        <li class="mr-2">--}}
{{--                            <a href="#" class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-white hover:border-white dark:hover:text-white">Aceitos</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
                @if($agendamentos)
                    <table>
                        <thead class="text-orange">
                            <tr>
                                <th>Nome solicitante</th>
                                <th>Telefone</th>
                                <th>E-mail</th>
                                <th>Data</th>
                                <th>Carro solicitado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agendamentos as $agendamento)
                                <tr>
                                    <td>{{ $usuario->nome ?? 'Não Cadastrado' }}</td>
                                    <td>{{ $usuario->telefone ?? 'Não Cadastrado' }}</td>
                                    <td>{{ $usuario->email ?? 'Não Cadastrado' }}</td>
                                    <td>{{ \Carbon\Carbon::create($agendamento->dt_agendamento)->format('d/m/Y') ?? 'Não Cadastrado' }}</td>
                                    <td>{{ ($agendamento->carro->marca . ' ' . $agendamento->carro->modelo) ?? 'Não Cadastrado' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h1 class="text-md text-white">Não existem agendamentos cadastrados</h1>
                @endif
            </div>
        </div>

        {{-- <div class="py-4"></div>

        {{-- <h1 class="text-2xl tracking-wider font-bold uppercase mb-6 font-black">Meus Carros</h1>

        <div class="flex flex-col md:flex-row flex-wrap gap-4">
            @foreach($carros as $carro)
                <x-car.card :carro="$carro" />
            @endforeach
        </div> --}}
    </div>
@endsection
