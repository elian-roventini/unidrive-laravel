@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section id="hero" class="bg-blue-dark mx-auto px-10 pt-2">
        @include('pages.home.hero')
    </section>
    <section id="dealerships" class="bg-blue-dark mx-auto p-10">
        <div class="space-y-2">
            <h2 class="text-2xl uppercase tracking-wide">Concessionárias</h2>
            <p class="text-xl font-light tracking-wide">Algumas das concessionárias que trabalhamos!</p>
        </div>

        <img class="mt-8" src="{{ asset('assets/images/dealerships.svg') }}">        
    </section>
    <section id="best-cars" class="mx-auto px-10 bg-white py-6">
        @include('pages.home.best-cars')
    </section>
    <section id="about" class="bg-blue-dark mx-auto px-10 py-6">
        @include('pages.home.about')
    </section>
@endsection