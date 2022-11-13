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
                    <option>Marca</option>
                    <option value="toyota" @if(old('marca') === 'toyota') selected @endif>Toyota</option>
                    <option value="volkswagen" @if(old('marca') === 'volkswagen') selected @endif>Volkswagen</option>
                    <option value="ford" @if(old('marca') === 'ford') selected @endif>Ford</option>
                    <option value="honda" @if(old('marca') === 'honda') selected @endif>Honda</option>
                    <option value="hyundai" @if(old('marca') === 'hyundai') selected @endif>Hyundai</option>
                    <option value="nissan" @if(old('marca') === 'nissan') selected @endif>Nissan</option>
                    <option value="chevrolet" @if(old('marca') === 'chevrolet') selected @endif>Chevrolet</option>
                    <option value="kia" @if(old('marca') === 'kia') selected @endif>Kia</option>
                    <option value="mercedes-benz" @if(old('marca') === 'mercedes-benz') selected @endif>Mercedes-Benz</option>
                    <option value="bmw" @if(old('marca') === 'bmw') selected @endif>BMW</option>
                </x-form.select>
                <x-form.select x-col="col-span-6 sm:col-span-3" class="mt-3" name="modelo" placeholder="Modelo">
                    <option>Modelo</option>
                    <option value="gol" @if(old('modelo') === 'gol') selected @endif>Gol</option>
                    <option value="uno" @if(old('modelo') === 'uno') selected @endif>Uno</option>
                    <option value="palio" @if(old('modelo') === 'palio') selected @endif>Palio</option>
                    <option value="fox" @if(old('modelo') === 'fox') selected @endif>Fox</option>
                    <option value="crossfox" @if(old('modelo') === 'crossfox') selected @endif>CrossFox</option>
                    <option value="siena" @if(old('modelo') === 'siena') selected @endif>Siena</option>
                    <option value="voyage" @if(old('modelo') === 'voyage') selected @endif>Voyage</option>
                </x-form.select>
                <x-form.select x-col="col-span-6 sm:col-span-3" class="mt-3" name="ano" placeholder="Ano">
                    <option>Ano</option>
                    <option value="2023" @if(old('ano') === '2023') selected @endif>2023</option>
                    <option value="2022" @if(old('ano') === '2022') selected @endif>2022</option>
                    <option value="2021" @if(old('ano') === '2021') selected @endif>2021</option>
                    <option value="2020" @if(old('ano') === '2020') selected @endif>2020</option>
                    <option value="2019" @if(old('ano') === '2019') selected @endif>2019</option>
                    <option value="2018" @if(old('ano') === '2018') selected @endif>2018</option>
                    <option value="2017" @if(old('ano') === '2017') selected @endif>2017</option>
                    <option value="2016" @if(old('ano') === '2016') selected @endif>2016</option>
                    <option value="2015" @if(old('ano') === '2015') selected @endif>2015</option>
                    <option value="2014" @if(old('ano') === '2014') selected @endif>2014</option>
                    <option value="2013" @if(old('ano') === '2013') selected @endif>2013</option>
                    <option value="2012" @if(old('ano') === '2012') selected @endif>2012</option>
                    <option value="2011" @if(old('ano') === '2011') selected @endif>2011</option>
                    <option value="2010" @if(old('ano') === '2010') selected @endif>2010</option>
                </x-form.select>
                <x-form.select x-col="col-span-6 sm:col-span-3" class="mt-3" name="cor" placeholder="Cor">
                    <option>Cor</option>
                    <option value="azul" @if(old('cor') === 'azul') selected @endif>Azul</option>
                    <option value="vermelho" @if(old('cor') === 'vermelho') selected @endif>Vermelho</option>
                    <option value="amarelo" @if(old('cor') === 'amarelo') selected @endif>Amarelo</option>
                    <option value="branco" @if(old('cor') === 'branco') selected @endif>Branco</option>
                    <option value="preto" @if(old('cor') === 'preto') selected @endif>Preto</option>
                    <option value="cinza" @if(old('cor') === 'cinza') selected @endif>Cinza</option>
                    <option value="marrom" @if(old('cor') === 'marrom') selected @endif>Marrom</option>
                </x-form.select>

                <x-form.input x-col="col-span-6" name="documentacao" placeholder="Documentação" />
                <x-form.input x-col="col-span-6" name="placa" placeholder="Placa" />
                <x-form.input x-col="col-span-6" name="quilometragem" placeholder="Quilometragem" />
                <x-form.input x-col="col-span-6" name="renovam" placeholder="Renavam" />

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
