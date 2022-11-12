@extends('layouts.app')

@section('title', 'Carros')

@section('content')
    <div class="bg-white text-black p-8 my-4 mx-auto">
        <h1 class="text-2xl tracking-wider font-bold uppercase mb-6">Pesquisar Carros</h1>

        <div class="flex flex-col md:flex-row">
            @include('pages.car.search-box')

            @include('pages.car.list')
        </div>
    </div>
@endsection
