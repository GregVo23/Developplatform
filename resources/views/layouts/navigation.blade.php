<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center mr-24">
                    <a href="{{ route('dashboard') }}">
                        <img class="block h-10 w-auto" src="{{ asset('images/logo.svg') }}" alt="Developplatform logo">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Accueil') }}
                    </x-nav-link>
                    <x-menu-window>
                        <x-slot name="triggermenu">

                            <a class="inline-flex items-center px-1 pt-6 pb-5 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 cursor-pointer focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">Projets</a>

                        </x-slot>
                        <x-slot name="contentmenu">


                                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                    <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8 lg:grid-cols-2">
                                        <p><b class="text-gray-800">Je suis prestataire</b></p>
                                        <p><b class="text-gray-800">Je suis client</b></p>
                                    <a href="{{ route('projects.choose') }}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                                        <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-yellow text-white sm:h-12 sm:w-12">
                                        <!-- Heroicon name: outline/chart-bar -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                        </div>
                                        <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">
                                            Rechercher
                                        </p>
                                        <p class="mt-1 text-sm text-gray-500">
                                            Vous rechercher un projet à réaliser.
                                        </p>
                                        </div>
                                    </a>

                                    <a href="{{ route('project.create') }}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                                        <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">
                                        <!-- Heroicon name: outline/cursor-click -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                        </svg>
                                        </div>
                                        <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">
                                            Publier
                                        </p>
                                        <p class="mt-1 text-sm text-gray-500">
                                            Vous publiez une demande de devis.
                                        </p>
                                        </div>
                                    </a>

                                    <a href="{{ route('projects.maked.mine', Auth()->user()->id) }}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                                        <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-yellow text-white sm:h-12 sm:w-12">
                                        <!-- Heroicon name: outline/shield-check -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                        </div>
                                        <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">
                                            Mes propositions
                                        </p>
                                        <p class="mt-1 text-sm text-gray-500">
                                            La liste des offres que vous avez soumises.
                                        </p>
                                        </div>
                                    </a>

                                    <a href="{{ route('projects.mine', Auth()->user()->id) }}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                                        <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">
                                        <!-- Heroicon name: outline/view-grid -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                        </svg>
                                        </div>
                                        <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">
                                            Mes projets
                                        </p>
                                        <p class="mt-1 text-sm text-gray-500">
                                            La liste de vos demandes de réalisations.
                                        </p>
                                        </div>
                                    </a>

                                    <a href="{{ route('favoris.index', Auth()->user()->id) }}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                                        <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-yellow text-white sm:h-12 sm:w-12">
                                        <!-- Heroicon name: outline/refresh -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                        </div>
                                        <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">
                                            Mes favoris
                                        </p>
                                        <p class="mt-1 text-sm text-gray-500">
                                            Les projets pour lesquels vous marquez un intérêt.
                                        </p>
                                        </div>
                                    </a>

                                    <a href="{{ route('makers.index') }}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                                        <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">
                                        <!-- Heroicon name: outline/document-report -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        </div>
                                        <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">
                                            Les prestataires
                                        </p>
                                        <p class="mt-1 text-sm text-gray-500">
                                            Vous recherchez un prestataire
                                        </p>
                                        </div>
                                    </a>
                                    </div>
                                    <div class="p-5 bg-gray-50 sm:p-8">
                                    <a href="#" class="-m-3 p-3 flow-root rounded-md hover:bg-gray-100 transition ease-in-out duration-150">
                                        <span class="flex items-center">
                                        <span class="text-base font-medium text-gray-900">
                                            Nos abonnements
                                        </span>
                                        <span class="ml-3 inline-flex items-center px-3 py-0.5 rounded-full text-xs font-medium leading-5 bg-indigo-100 text-indigo-800">
                                            Update
                                        </span>
                                        </span>
                                        <span class="mt-1 block text-sm text-gray-500">
                                        Abonnez-vous et développez votre activité.
                                        </span>
                                    </a>
                                    </div>
                                </div>
                        </x-slot>

                    </x-menu-window>
                    <x-nav-link :href="route('projects.index')" :active="request()->routeIs('projects.index')">
                        {{ __('Voir tous les projets') }}
                    </x-nav-link>
                    <x-nav-link :href="route('favoris.index', Auth()->user()->id)" :active="request()->routeIs('favoris.index')">
                        {{ __('Messages') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">

                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name() }}</div>

                        <div class="m-2">
                            <div class="group w-full h-full rounded-full overflow-hidden shadow-inner text-center bg-purple table cursor-pointer">
                                @if(!empty( "{{ Auth()->user()->avatar }}" ))
                                <img src="{{ asset(Auth()->user()->avatar) }}" alt="profile image" style="object-fit:cover; width:40px;">
                                @endif
                            </div>
                        </div>


                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profil.show', Auth()->user()->id)">

                            {{ __('Mon profil') }}

                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Se déconnecter') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">

            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Accueil') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('projects.index')" :active="request()->routeIs('projects.index')">
                {{ __('Rechercher') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('project.create')" :active="request()->routeIs('project.create')">
                {{ __('Demander') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('favoris.index', Auth()->user()->id)" :active="request()->routeIs('favoris.index', Auth()->user()->id)">
                {{ __('Favoris') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('projects.mine', Auth()->user()->id)" :active="request()->routeIs('projects.mine', Auth()->user()->id)">
                {{ __('Mes demandes') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('projects.maked.mine', Auth()->user()->id)" :active="request()->routeIs('projects.maked.mine', Auth()->user()->id)">
                {{ __('Mes offres') }}
            </x-responsive-nav-link>

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->firstname }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Se déconnecter') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
