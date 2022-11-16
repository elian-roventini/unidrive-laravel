<div class="py-6 flex flex-col lg:flex-row lg:justify-between gap-6">
    <div class="max-w-xl space-y-6">
        <h1 class="text-2xl uppercase tracking-wide">{{ __('pages.home.hero.title') }}</h1>
        <p class="text-xl font-light tracking-wide">{{ __('pages.home.hero.subtitle') }}</p>
        <x-button :href="route('about.index')">{{ __('pages.home.hero.button') }}</x-button>
    </div>
</div>
