@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container flex mx-auto py-32">
        <div class="grid justify-items-center w-1/2">
            <h1 class="my-3 text-2xl text-black uppercase font-semibold">Login</h1>

            <form>
                <x-form.input placeholder="CPF/CNPJ"></x-form.input>
                <x-form.input placeholder="Senha" type="password"></x-form.input>

                <div class="flex items-center justify-end mt-4">
                    <x-button type="button">Login</x-button>
                </div>
            </form>
        </div>
        <div class="grid justify-items-center w-1/2 gap-4">
            <h1 class="my-3 text-2xl text-black uppercase font-semibold">Cadastrar</h1>

            <x-button :href="route('auth.register.user')">Cadastrar Usuário</x-button>
            <x-button :href="route('auth.register.dealership')">Cadastrar Concessionária</x-button>
        </div>
    </div>
@endsection
