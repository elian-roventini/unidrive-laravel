@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section id="hero">
        @include('pages.home.hero')
    </section>
    <section id="dealerships">
        <div class="space-y-2">
            <h2 class="text-2xl uppercase tracking-wide">Concessionárias</h2>
            <p class="text-xl font-light tracking-wide">Algumas das concessionárias que trabalhamos!</p>
        </div>

        <img class="mt-12" src="{{ asset('assets/images/dealerships.svg') }}">        
    </section>
    <section id="best-cars">
        @include('pages.home.best-cars')
    </section>
    <section id="about">
        @include('pages.home.about')
    </section>
@endsection