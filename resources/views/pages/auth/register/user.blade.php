@extends('layouts.app')

@section('title', 'Cadastrar Usuário')

@section('content')
    <div class="bg-white text-black p-8 my-4 mx-auto">
        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
            <p class="font-medium text-lg">Cadastrar Usuário</p>

            <form class="" method="POST" action="{{ route('auth.register.user.store') }}">
                <div class="lg:col-span-2">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                        @csrf

                        <x-form.input class="md:col-span-5" name="name" placeholder="Nome"/>
                        <x-form.input class="md:col-span-5" name="email" placeholder="E-mail" type="email"/>
                        <x-form.input class="md:col-span-5" name="password" placeholder="Senha" type="password"/>
                        <x-form.input class="md:col-span-3" name="cpf" placeholder="CPF"/>
                        <x-form.input class="md:col-span-2" name="cnh" placeholder="CNH"/>
                        <x-form.input class="md:col-span-5" name="telefone" placeholder="Telefone"/>
                        <x-form.input class="md:col-span-3" name="endereço" placeholder="Endereço"/>
                        <x-form.input class="md:col-span-2" name="numero" placeholder="Número"/>
                        <x-form.input class="md:col-span-5" name="complemento" placeholder="Complemento"/>
                        <x-form.input class="md:col-span-5" name="cep" placeholder="CEP"/>

                        <div class="md:col-span-5 inline-flex justify-end mt-3">
                            <x-button type="button">Cadastrar</x-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
