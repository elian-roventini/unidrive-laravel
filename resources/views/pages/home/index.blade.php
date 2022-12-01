@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section id="hero" class="mx-auto px-10 pt-2">
        @include('pages.home.hero')
    </section>
    <section id="dealerships" class="mx-auto px-10 p-10">
        <div class="space-y-2">
            <h2 class="text-2xl uppercase tracking-wide">{{ __('pages.home.dealerships.title') }}</h2>
            <p class="text-xl font-light tracking-wide">{{ __('pages.home.dealerships.subtitle') }}</p>
        </div>

        <img class="mx-auto mt-8" src="{{ asset('assets/images/dealerships.svg') }}" alt="lista de logo de concessionárias atendidas.">
    </section>
    <section id="best-cars" class="mx-auto px-10 bg-white py-6">
        @include('pages.home.best-cars')
    </section>
    <section id="about" class="mx-auto px-10 py-6">
        @include('pages.home.about')
    </section>
@endsection
