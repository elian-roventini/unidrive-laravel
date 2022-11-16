@extends('layouts.app')

@section('title', 'Termos e condições')

@section('content')
    <section id="about" class="bg-white text-black p-8 mx-auto">
        <div class="mt-6 flex flex-col lg:flex-row lg:justify-between gap-12">
            <div class="space-y-2">
                <h2 class="text-2xl uppercase tracking-wide">{{ __('pages.terms_and_conditions.title') }}</h2>
                <p class="text-base font-light tracking-wide">{{ __('pages.terms_and_conditions.message') }}</p>
            </div>
        </div>
    </section>
@endsection
