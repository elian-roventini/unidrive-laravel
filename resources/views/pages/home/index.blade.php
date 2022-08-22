@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section id="hero">
        @include('pages.home.hero')
    </section>
    <section id="dealerships">
        <h1 class="text-2xl uppercase tracking-wide">Concessionárias</h1>
        <p class="text-xl font-light tracking-wide">Algumas das concessionárias que trabalhamos!</p>

        <img class="mt-12" src="{{ asset('assets/images/dealerships.svg') }}">        
    </section>
@endsection