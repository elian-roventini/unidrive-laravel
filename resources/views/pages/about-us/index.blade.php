@extends('layouts.app')

@section('title', 'Sobre Nós')

@section('content')
    <section id="about" class="bg-white text-black p-8 mx-auto">
        <div class="mt-6 flex flex-col lg:flex-row lg:justify-between gap-12">
            <div class="space-y-2">
                <h2 class="text-2xl uppercase tracking-wide">{{ __('pages.about_us.title') }}</h2>
                <p class="text-base font-light tracking-wide">{{ __('pages.about_us.message') }}</p>
            </div>
            <img src="assets/images/dealership_photo.png" class="max-w-md  pr-6" alt="photo of a dealership with a red car in the center">
        </div>
    </section>
@endsection
