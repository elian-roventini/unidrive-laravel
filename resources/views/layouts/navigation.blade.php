<nav x-data="{ open: false }">
    <div class="flex justify-between h-16 py-3">
        <div class="flex items-center">
            <a href="{{ route('home.index') }}">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="Logo Unidrive">
            </a>
        </div>

        <div class="hidden space-x-8 sm:-my-px sm:ml-10 md:flex">
            <x-nav.link :href="route('home.index')" :active="request()->routeIs('home.index')">
                {{ __('Home') }}
            </x-nav.link>
            <x-nav.link :href="route('car.index')" :active="request()->routeIs('car.index')">
                {{ __('Carros') }}
            </x-nav.link>
            <x-nav.link :href="route('about.index')" :active="request()->routeIs('about.index')">
                {{ __('Sobre Nós') }}
            </x-nav.link>
        </div>

        @guest
            <div class="hidden md:flex md:items-center md:ml-6 space-x-2">
                <x-button :href="route('auth.login')" outline>Login</x-button>
                <x-dropdown>
                    <x-slot name="trigger">
                        <x-button outline>Cadastrar</x-button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="grid justify-items-end px-4 py-2 space-y-2">
                            <x-button :href="route('user.create')">Usuário</x-button>
                            <x-button :href="route('dealership.create')">Concessionária</x-button>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>
        @endguest

        @auth
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name ?? '' }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <form method="POST" action="{{ route('auth.logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('auth.logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Deslogar') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        @endauth

        <!-- Hamburger -->
        <div class="-mr-2 flex items-center md:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path
                        :class="{'hidden': open, 'inline-flex': ! open }"
                        class="inline-flex"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                    <path
                        :class="{'hidden': ! open, 'inline-flex': open }"
                        class="hidden"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden md:hidden pb-6">
        <div class="pt-2 pb-3 space-y-1">
            <x-nav.responsive-link :href="route('home.index')" :active="request()->routeIs('home.index')">
                {{ __('Home') }}
            </x-nav.responsive-link>
            <x-nav.responsive-link :href="route('car.index')" :active="request()->routeIs('car.index')">
                {{ __('Carros') }}
            </x-nav.responsive-link>
            <x-nav.responsive-link :href="route('about.index')" :active="request()->routeIs('about.index')">
                {{ __('Sobre Nós') }}
            </x-nav.responsive-link>
        </div>

        @guest
            <div class="flex flex-col space-y-4">
                <x-button :href="route('auth.login')" class="w-40" outline>Login</x-button>
                <x-button :href="route('user.create')" class="w-40">Cadastrar <br> Usuário</x-button>
                <x-button :href="route('dealership.create')" class="w-40">Cadastrar <br> Concessionária</x-button>
            </div>
        @endguest

        @auth
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-white">
                <div class="px-4">
                    <div class="font-medium text-base">{{ Auth::user()->name ?? '' }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email ?? '' }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <form method="POST" action="{{ route('auth.logout') }}">
                        @csrf

                        <x-nav.responsive-link :href="route('auth.logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Deslogar') }}
                        </x-nav.responsive-link>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</nav>
