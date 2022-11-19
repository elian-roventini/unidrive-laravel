@extends('layouts.app')

@section('title', 'Cadastrar Usuário')

@section('content')
    <div class="bg-white text-black p-8 mx-auto">

        <x-message.success />
        <x-message.error />

        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
            <p class="font-medium text-lg">Cadastrar Usuário</p>

            <form class="" method="POST" action="{{ route('user.store') }}">
                <div class="lg:col-span-2">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                        @csrf

                        <x-form.input id="nome" x-col="md:col-span-5" name="nome" placeholder="Nome">Nome</x-form.input>
                        <x-form.input id="email" x-col="md:col-span-5" name="email" placeholder="E-mail" type="email">E-mail</x-form.input>
                        <x-form.input id="senha" x-col="md:col-span-5" name="senha" placeholder="Senha" type="password">Senha</x-form.input>
                        <x-form.input id="cpf" x-col="md:col-span-3" name="cpf" placeholder="CPF">CPF</x-form.input>
                        <x-form.input id="cnh" x-col="md:col-span-2" name="cnh" placeholder="CNH">CNH</x-form.input>
                        <x-form.input id="telefone" x-col="md:col-span-5" name="telefone" placeholder="(00) 00000-0000">Telefone</x-form.input>
                        <x-form.input id="endereco" x-col="md:col-span-3" name="endereco" placeholder="Endereço">Endereço</x-form.input>
                        <x-form.input id="numero" x-col="md:col-span-2" name="numero" placeholder="Número">Número</x-form.input>
                        <x-form.input id="complemento" x-col="md:col-span-5" name="complemento" placeholder="Complemento">Complemento</x-form.input>
                        <x-form.input id="cep" x-col="md:col-span-5" name="cep" placeholder="00000-000">CEP</x-form.input>

                        <div class="md:col-span-5 inline-flex justify-end mt-3">
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
            $('#cpf').mask('000.000.000-00', { reverse: true, placeholder: "___.___.___-__" });
            $('#cnh').mask('000000000000', { reverse: true });
            $('#telefone').mask('(00) 00000-0000', { placeholder: "(__) _____-____" });
            $('#cep').mask('00000-000', { placeholder: "_____-___" });
            $('#numero').mask('00000000000000');
        });
    </script>
@endpush
