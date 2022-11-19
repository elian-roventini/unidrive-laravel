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

                <p class="text-orange font-bold">Telefone:</p>
                <p class="">{{ $usuario->telefone ?? 'Não Cadastrado' }}</p>

                <p class="text-orange font-bold">CPF:</p>
                <p class="">{{ $usuario->cpf ?? 'Não Cadastrado' }}</p>

                <p class="text-orange font-bold">CNH:</p>
                <p class="">{{ $usuario->cnh ?? 'Não Cadastrado' }}</p>

                <p class="text-orange font-bold">Endereço:</p>
                <p class="">{{ $usuario->endereco->endereco ?? 'Não Cadastrado' }}</p>

                <p class="text-orange font-bold">Complemento:</p>
                <p class="">{{ $usuario->endereco->complemento ?? 'Não Cadastrado' }}</p>
            </div>

            @if($usuario->concessionaria)
                @include('pages.car.create', [ 'concessionaria' => $usuario->concessionaria->nomeFantasia ])
            @else
                <div class="grid md:w-1/2 bg-blue-dark text-white p-4 rounded-lg">
                    <x-button href="{{ route('dealership.create') }}" class="w-fit h-16 mx-auto self-center">Cadastrar Concessionária</x-button>
                </div>
            @endif
        </div>

        <div class="py-4"></div>

        @if($usuario->concessionaria)
            <h1 class="text-2xl tracking-wider font-bold uppercase mb-6">Pedidos de TestDrive</h1>

            <div class="flex flex-col md:flex-row gap-4">
                <div class="grid w-full bg-blue-dark text-white p-4 rounded-lg gap-4 overflow-x-auto">
                    @if($agendamentos)
                        <table>
                            <thead class="text-orange">
                                <tr>
                                    <th>Nome solicitante</th>
                                    <th>Telefone</th>
                                    <th>E-mail</th>
                                    <th>Data</th>
                                    <th>Hora Inicial</th>
                                    <th>Hora Final</th>
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
                                        <td>{{ \Carbon\Carbon::create($agendamento->hr_inicial)->format('H:i') ?? 'Não Cadastrado' }}</td>
                                        <td>{{ \Carbon\Carbon::create($agendamento->hr_final)->format('H:i') ?? 'Não Cadastrado' }}</td>
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

            <div class="py-4"></div>

            <h1 class="text-2xl tracking-wider font-bold uppercase mb-6 font-black">Meus Carros</h1>

            <div class="flex flex-col md:flex-row flex-wrap gap-4">
                @foreach($carros as $carro)
                    <x-car.card :carro="$carro" />
                @endforeach
            </div>
        @endif
    </div>
@endsection
