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

                        <x-form.input id="nome" x-col="col-span-6" name="nome" placeholder="Nome Fantasia">Nome</x-form.input>
                        <x-form.input id="email" x-col="col-span-6" name="email" placeholder="E-mail" type="email">E-mail</x-form.input>
                        <x-form.input id="cnpj" x-col="col-span-6" name="cnpj" placeholder="CNPJ">CNPJ</x-form.input>
                        <x-form.input id="telefone" x-col="col-span-6" name="telefone" placeholder="Telefone">Telefone</x-form.input>
                        <x-form.input id="cep" x-col="col-span-2" name="cep" placeholder="CEP">CEP</x-form.input>
                        <x-form.input id="cidade" x-col="col-span-2" name="cidade" placeholder="Cidade">Cidade</x-form.input>
                        <x-form.input id="estado" x-col="col-span-2" name="estado" placeholder="Estado">Estado</x-form.input>
                        <x-form.input id="endereco" x-col="col-span-4" name="endereco" placeholder="Endereço">Endereço</x-form.input>
                        <x-form.input id="numero" x-col="col-span-2" name="numero" placeholder="Número">Número</x-form.input>
                        <x-form.input id="complemento" x-col="col-span-6" name="complemento" placeholder="Complemento">Complemento</x-form.input>

                        <div class="md:col-span-6 inline-flex items-center">
                            <x-form.checkbox id="terms-and-conditions" name="terms-and-conditions" />
                            <p class="text-md text-black">Concordo com os <a href="{{ route('terms-and-conditions.index') }}" class="text-orange">termos e condições</a>.</p>
                        </div>
                        @error('terms-and-conditions')
                            <small class="col-span-6 text-red-500 alert alert-danger">Você deve concordar com os termos e condições!</small>
                        @enderror

                        <div class="md:col-span-6 inline-flex justify-end mt-3">
                            <x-button type="button">Cadastrar</x-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#cnpj').mask('00.000.000/0000-00', { reverse: true, placeholder: "__.___.___/____-__" });
            $('#telefone').mask('(00) 00000-0000', { placeholder: "(__) _____-____" });
            $('#cep').mask('00000-000', { placeholder: "_____-___" });
            $('#numero').mask('00000000000000');
        });
    </script>
@endpush
