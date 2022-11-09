@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="bg-white text-black container p-16 my-10 mx-auto">
        <div class="p-4 px-4 md:p-8 mb-6">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                <div class="text-black">
                    <p class="font-medium text-lg">Login</p>
                </div>

                <div class="lg:col-span-2">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                        <div class="md:col-span-5">
                            <x-form.input name="cpf_cnpj" placeholder="CPF/CNPJ">CPF/CNPJ</x-form.input>
                        </div>

                        <div class="md:col-span-5 mt-3">
                            <x-form.input name="password" placeholder="Senha" type="password">Senha</x-form.input>
                        </div>

                        <div class="md:col-span-5 text-right">
                            <div class="inline-flex items-end">
                                <x-button type="button">Login</x-button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
