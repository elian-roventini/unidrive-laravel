@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="bg-white text-black p-8 my-4 mx-auto">
        <div class="p-4 px-4 md:p-8 mb-6 max-w-sm mx-auto">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                <div class="text-black">
                    <p class="font-medium text-lg">Login</p>
                </div>

                <div class="lg:col-span-2">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                        <x-form.input x-col="md:col-span-5" name="email" placeholder="E-mail"/>
                        <x-form.input x-col="md:col-span-5" name="password" placeholder="Senha" type="password"/>

                        <div class="md:col-span-5 inline-flex justify-end mt-3">
                            <x-button type="button">Login</x-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
