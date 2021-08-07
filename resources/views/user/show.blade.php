<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<style>
    @layer utilities {
  .text-gradient {
    background-clip: text;
    -webkit-text-fill-color: transparent;
  }
}
    :root {
        --main-color: #4a76a8;
    }

    .bg-main-color {
        background-color: var(--main-color);
    }

    .text-main-color {
        color: var(--main-color);
    }

    .border-main-color {
        border-color: var(--main-color);
    }
</style>

    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p-3 border-t-4 border-indigo-400">
                    <div class="image overflow-hidden">
                        @if(!empty( "{{ $user->avatar }}" ))
                        <img src="{{ asset($user->avatar) }}" alt="profile image" style="object-fit:cover;">
                        @endif
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ $user->firstname }}</h1>
                    <h3 class="text-gray-600 font-lg text-semibold leading-6"><b>Niveau</b> : {{ $user->level }}</h3>
                    <p class="mt-4 text-sm text-gray-500 hover:text-gray-600 leading-6">{{ $user->about }}</p>
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>Statut</span>
                            <span class="ml-auto">
                            <span class="bg-indigo-500 py-1 px-2 rounded text-white text-sm">Actif</span></span>
                        </li>
                        <li class="py-3">
                            <p>Devenu membre</p>
                            <span class="ml-auto">{{ $user->created_at->diffForHumans() }}</span>
                        </li>
                    </ul>
                </div>
                <!-- End of profile card -->
                <div class="my-4"></div>

            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">

                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold"><b>Prénom</b></div>
                                <div class="px-4 py-2">{{ $user->firstname }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold"><b>Nom de famille</b></div>
                                <div class="px-4 py-2">{{ $user->lastname }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold"><b>Téléphone</b></div>
                                <div class="px-4 py-2">{{ $user->phone ? $user->phone : "non communiqué" }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold"><b>Email</b></div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex">
                        @if ($user->id === auth()->user()->id)
                            <button
                                class="flex items-center ml-4
                                focus:outline-none group border rounded-full
                                py-2 px-8 leading-none border-indigo-600
                                dark:border-yellow select-none
                                hover:bg-indigo-600 text-indigo-600 hover:text-white
                                dark-hover:text-gray-200 transition ease-in-out duration-200 transform hover:-translate-y-1 hover:translate-x-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <span class="text-gray-700 group-hover:text-white">
                                    {{ "Modifier mon profil" }}
                                </span>
                            </button>

                            <button
                                class="flex items-center ml-4
                                focus:outline-none group border rounded-full
                                py-2 px-8 leading-none border-yellow
                                dark:border-yellow select-none
                                hover:bg-yellow text-yellow hover:text-white
                                dark-hover:text-gray-200 transition ease-in-out duration-200 transform hover:-translate-y-1 hover:translate-x-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <span class="text-gray-700 group-hover:text-white">
                                    {{ "Supprimer mon profil" }}
                                </span>
                            </button>
                        @endif
                    </div>
                </div>
                <!-- End of about section -->

                <div class="my-4"></div>

                <!-- Experience and education -->
                <div class="bg-white p-3 shadow-sm rounded-sm">

                    <div class="grid grid-cols-2">
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-indigo-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Demandes de réalisation</span>
                            </div>
                            <ul class="list-inside space-y-2">

                                @forelse ($myProjects as $myProject)
                                    <li>
                                        <div class="text-indigo-600 "><a href="{{ route('project.show', $myProject->id) }}">{{ $myProject->name }}</a></div>
                                        <div class="text-gray-500 text-xs">Demandé {{ $myProject->created_at->diffForHumans() }}</div>
                                    </li>
                                @empty
                                    <li>
                                        <div class="text-teal-600">Aucune demandes de réalisation</div>
                                    </li>
                                @endforelse

                            </ul>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-indigo-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 15.536c-1.171 1.952-3.07 1.952-4.242 0-1.172-1.953-1.172-5.119 0-7.072 1.171-1.952 3.07-1.952 4.242 0M8 10.5h4m-4 3h4m9-1.5a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Offres de prestations</span>
                            </div>
                            <ul class="list-inside space-y-2">

                                @forelse ($myProjectsDone as $myProjects)
                                    <li>
                                        <div class="text-indigo-600 "><a href="{{ route('project.show', $myProjectDone->id) }}">{{ $myProjectDone->name }}</a></div>
                                        <div class="text-gray-500 text-xs">Réalisé {{ $myProjectDone->created_at->diffForHumans() }}</div>
                                    </li>
                                @empty
                                    <li>
                                        <div class="text-teal-600">Aucune offres</div>
                                    </li>
                                @endforelse

                            </ul>

                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3 mt-8">
                                <span clas="text-indigo-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Projets réalisés</span>
                            </div>
                            <ul class="list-inside space-y-2">

                                @forelse ($myProjectsDone as $myProjects)
                                    <li>
                                        <div class="text-indigo-600 "><a href="{{ route('project.show', $myProjectDone->id) }}">{{ $myProjectDone->name }}</a></div>
                                        <div class="text-gray-500 text-xs">Réalisé {{ $myProjectDone->created_at->diffForHumans() }}</div>
                                    </li>
                                @empty
                                    <li>
                                        <div class="text-teal-600">Aucune réalisations</div>
                                    </li>
                                @endforelse

                            </ul>
                        </div>
                    </div>
                    <!-- End of Experience and education grid -->
                </div>
                <!-- End of profile tab -->
            </div>
        </div>
    </div>
</x-app-layout>
