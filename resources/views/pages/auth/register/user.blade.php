@extends('layouts.app')

@section('title', 'Cadastrar Usuário')

@section('content')
    <div class="bg-white text-black p-8 mx-auto">

        @if(session()->has('success'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mb-6" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                        <p class="font-bold">{{ session()->get('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if(session()->has('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                <strong class="font-bold">{{ session()->get('error') }}</strong>
            </div>
        @endif

        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
            <p class="font-medium text-lg">Cadastrar Usuário</p>

            <form class="" method="POST" action="{{ route('user.store') }}">
                <div class="lg:col-span-2">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                        @csrf

                        <x-form.input x-col="md:col-span-5" name="nome" placeholder="Nome"/>
                        <x-form.input x-col="md:col-span-5" name="email" placeholder="E-mail" type="email"/>
                        <x-form.input x-col="md:col-span-5" name="senha" placeholder="Senha" type="password"/>
{{--                        <x-form.input x-col="md:col-span-3" name="cpf" placeholder="CPF"/>--}}
{{--                        <x-form.input x-col="md:col-span-2" name="cnh" placeholder="CNH"/>--}}
{{--                        <x-form.input x-col="md:col-span-5" name="telefone" placeholder="Telefone"/>--}}
{{--                        <x-form.input x-col="md:col-span-3" name="endereço" placeholder="Endereço"/>--}}
{{--                        <x-form.input x-col="md:col-span-2" name="numero" placeholder="Número"/>--}}
{{--                        <x-form.input x-col="md:col-span-5" name="complemento" placeholder="Complemento"/>--}}
{{--                        <x-form.input x-col="md:col-span-5" name="cep" placeholder="CEP"/>--}}

                        <div class="md:col-span-5 inline-flex justify-end mt-3">
                            <x-button type="button">Cadastrar</x-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
