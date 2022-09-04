@extends('layouts.app')

@section('title', 'Cadastrar Concessionária')

@section('content')
    <div class="container flex mx-auto px-6 py-6 lg:py-14">
        <div class="grid justify-items-center w-full lg:w-1/2">
            <h1 class="my-3 text-2xl text-black uppercase font-semibold">Cadastrar Concessionária</h1>

            <form class="max-w-sm">
                <x-form.input placeholder="Nome Fantasia"></x-form.input>
                <x-form.input placeholder="E-mail" type="email"></x-form.input>

                <x-form.input class="" placeholder="CNPJ"></x-form.input>

                <x-form.input placeholder="Telefone"></x-form.input>

                <div class="flex flex-wrap -mx-3">
                    <div class="w-full sm:w-2/3 px-3">
                        <x-form.input placeholder="Endereço"></x-form.input>
                    </div>
                    <div class="w-full sm:w-1/3 px-3">
                        <x-form.input placeholder="Número"></x-form.input>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3">
                    <div class="w-full sm:w-2/3 px-3">
                        <x-form.input placeholder="Complemento"></x-form.input>
                    </div>
                    <div class="w-full sm:w-1/3 px-3">
                        <x-form.input placeholder="CEP"></x-form.input>
                    </div>
                </div>

                <p class="my-3 text-md text-black">Leia nossos termos e condições <a href="#" class="text-orange">clicando aqui!</a></p>
                <div>
                    <x-form.input type="checkbox" class="w-2 mr-4 float-left"></x-form.input>
                    <p class="text-md text-black">Concordo com os termos e condições</p>
                </div>

                <div class="flex justify-center md:justify-end mt-4">
                    <x-button type="button">Cadastrar</x-button>
                </div>
            </form>
        </div>
    </div>
@endsection
