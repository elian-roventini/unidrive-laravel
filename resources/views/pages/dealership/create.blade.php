@extends('layouts.app')

@section('title', 'Cadastrar Concessionária')

@section('content')
    <div class="bg-white text-black p-8 mx-auto">

        <x-message.success />
        <x-message.error />

        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
            <p class="font-medium text-lg">Cadastrar Concessionária</p>

            <form class="" method="POST" action="{{ route('dealership.store') }}">
                <div class="lg:col-span-2">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                        @csrf

                        <x-form.input x-col="md:col-span-6" name="nome" placeholder="Nome Fantasia" />
                        <x-form.input x-col="md:col-span-6" name="email" placeholder="E-mail" type="email" />
                        <x-form.input x-col="md:col-span-6" name="cnpj" placeholder="CNPJ" />
                        <x-form.input x-col="md:col-span-6" name="telefone" placeholder="Telefone" />
                        <x-form.input x-col="md:col-span-2" name="cep" placeholder="CEP" />
                        <x-form.input x-col="md:col-span-2" name="cidade" placeholder="Cidade" />
                        <x-form.input x-col="md:col-span-2" name="estado" placeholder="Estado" />
                        <x-form.input x-col="md:col-span-4" name="endereço" placeholder="Endereço" />
                        <x-form.input x-col="md:col-span-2" name="numero" placeholder="Número" />
                        <x-form.input x-col="md:col-span-6" name="complemento" placeholder="Complemento" />

                        <div class="md:col-span-6 inline-flex items-center">
{{--                            @todo --}}
{{--                            <x-form.input class="w-4 mr-4 float-left" type="checkbox" />--}}
                            <p class="text-md text-black">Concordo com os <a href="/termos-condicoes" class="text-orange">termos e condições</a>.</p>
                        </div>

                        <div class="md:col-span-6 inline-flex justify-end mt-3">
                            <x-button type="button">Cadastrar</x-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
