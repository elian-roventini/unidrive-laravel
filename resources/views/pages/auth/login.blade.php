@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="bg-white text-black p-8 mx-auto">

        <x-message.success />
        <x-message.error />

        <div class="p-4 px-4 md:p-8 mb-6 max-w-sm mx-auto">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                <div class="text-black">
                    <p class="font-medium text-lg">Login</p>
                </div>

                <div class="lg:col-span-2">
                    <form action="{{ route('auth.login') }}" method="POST" class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                        @csrf

                        <x-form.input x-col="md:col-span-5" name="email" placeholder="E-mail" type="email"/>
                        <x-form.input x-col="md:col-span-5" name="senha" placeholder="Senha" type="password"/>

                        <div class="md:col-span-5 inline-flex justify-end mt-3">
                            <x-button type="button">Login</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
