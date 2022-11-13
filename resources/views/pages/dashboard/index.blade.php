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

            <form class="grid md:w-1/2 bg-blue-dark text-white p-4 rounded-lg gap-x-4" method="POST" action="{{ route('car.store') }}">
                @csrf
                <h2 class="text-md tracking-wider font-bold uppercase mb-6 col-span-6">Cadastrar Carro</h2>

                <x-form.select x-col="col-span-6 sm:col-span-3" class="mt-3" name="marca" placeholder="Marca">
                    <option value="">Marca</option>
                </x-form.select>
                <x-form.select x-col="col-span-6 sm:col-span-3" class="mt-3" name="modelo" placeholder="Modelo">
                    <option value="">Modelo</option>
                </x-form.select>
                <x-form.select x-col="col-span-6 sm:col-span-3" class="mt-3" name="ano" placeholder="Ano">
                    <option value="">Ano</option>
                </x-form.select>
                <x-form.select x-col="col-span-6 sm:col-span-3" class="mt-3" name="cor" placeholder="Cor">
                    <option value="">Cor</option>
                </x-form.select>

                <x-form.input x-col="col-span-6" name="documentacao" placeholder="Documentação" />
                <x-form.input x-col="col-span-6" name="placa" placeholder="Placa" />
                <x-form.input x-col="col-span-6" name="quilometragem" placeholder="Quilometragem" />
                <x-form.input x-col="col-span-6" name="renavam" placeholder="Renavam" />

                <div class="col-span-6 inline-flex justify-end mt-3">
                    <x-button type="button">Cadastrar</x-button>
                </div>
            </form>
        </div>

        <div class="py-8"></div>

        <h1 class="text-2xl tracking-wider font-bold uppercase mb-6">Pedidos de TestDrive</h1>

        <div class="flex flex-col md:flex-row gap-4">
            <div class="grid w-full bg-blue-dark text-white p-4 rounded-lg gap-4 overflow-x-auto">
                <div class="text-sm font-medium text-center text-white border-b border-white dark:text-white dark:border-white">
                    <ul class="flex flex-wrap -mb-px">
                        <li class="mr-2">
                            <a href="#" class="inline-block p-4 text-orange rounded-t-lg border-b-2 border-orange active dark:text-orange dark:border-orange" aria-current="page">Solicitações</a>
                        </li>
                        <li class="mr-2">
                            <a href="#" class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-white hover:border-white dark:hover:text-white">Aceitos</a>
                        </li>
                    </ul>
                </div>
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
                                <td>{{ $agendamento->nome }}</td>
                                <td>{{ $agendamento->telefone }}</td>
                                <td>{{ $agendamento->email }}</td>
                                <td>{{ $agendamento->dt_agendamento }}</td>
                                <td>{{ $agendamento->modelo }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

{{--        <div class="py-8"></div>--}}

{{--        <h1 class="text-2xl tracking-wider font-bold uppercase mb-6">Meus Carros</h1>--}}

{{--        <div class="flex flex-col md:flex-row flex-wrap gap-4">--}}
{{--            @foreach($carros as $carro)--}}
{{--                <x-car.card--}}
{{--                    :image="$carro->image"--}}
{{--                    :name="$carro->name"--}}
{{--                    :price="$carro->price"--}}
{{--                    :description="$carro->description"--}}
{{--                    :date="$carro->date"--}}
{{--                    :place="$carro->place"--}}
{{--                    :distance="$carro->distance"--}}
{{--                />--}}
{{--            @endforeach--}}
{{--        </div>--}}
    </div>
@endsection
