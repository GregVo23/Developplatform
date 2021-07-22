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
                            <span class="ml-auto"><span
                                    class="bg-indigo-500 py-1 px-2 rounded text-white text-sm">Actif</span></span>
                        </li>
                        <li class="flex items-center py-3">
                            <span>Membre depuis</span>
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
                                <div class="px-4 py-2 font-semibold"><b>Addresse</b></div>
                                <div class="px-4 py-2">{{ $user->address() }}</div>
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
                    <button
                        class="flex w-1/2 text-gray-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                        <b>Modifier mon profil</b>
                    </button>
                    <button
                        class="flex w-1/2 text-gray-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                        <b>Supprimer mon profil</b>
                    </button>
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
                                <span class="tracking-wide">Mes demandes</span>
                            </div>
                            <ul class="list-inside space-y-2">

                                @forelse ($myProjects as $myProject)
                                    <li>
                                        <div class="text-teal-600"><a href="#">{{ $myProject->name }}</a></div>
                                        <div class="text-gray-500 text-xs">Demandé {{ $myProject->created_at->diffForHumans() }}</div>
                                    </li>
                                @empty
                                    <li>
                                        <div class="text-teal-600">Aucune demandes</div>
                                    </li>
                                @endforelse

                            </ul>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-indigo-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                        <path fill="#fff"
                                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Projets réalisés</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                <li>
                                    <div class="text-teal-600">Lorem ypsum</div>
                                    <div class="text-gray-500 text-xs">Lorem ypsum</div>
                                    <h1 class="bg-clip-text text-transparent bg-gradient-to-l from-blue-600 to-indigo-400">Gradient Text</h1>
                                </li>
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
