<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="mx-2 text-xl text-gray-700">Bonjour <b>{{ Auth()->user()->firstname }}</b> !</h3><p class="mx-2 mt-2 text-gray-500">Prêt pour développer votre activité ?</p>
                    <div class="mt-4 flex">
                        <div class="flex mx-2">
                        <button
						class="flex items-center
						focus:outline-none border rounded-full
						py-2 px-6 leading-none border-gray-500
						dark:border-gray-600 select-none
						hover:bg-indigo-700 hover:text-white
						dark-hover:text-gray-200">
						<svg
							class="h-5 w-5 fill-current mr-2"
							viewBox="0 0 24 24">
							<path
							d="M14
							12v7.88c.04.3-.06.62-.29.83a.996.996
							0 01-1.41 0l-2.01-2.01a.989.989 0
							01-.29-.83V12h-.03L4.21 4.62a1 1
							0
							01.17-1.4c.19-.14.4-.22.62-.22h14c.22
							0 .43.08.62.22a1 1 0 01.17
							1.4L14.03 12H14z"></path>
						</svg>
						<span>Chercher un projet</span>
						</button>
                        </div>
                        <div class="flex mx-2">
                        <a href="{{ route('create_project') }}"><button
						class="flex items-center
						focus:outline-none border rounded-full
						py-2 px-6 leading-none border-gray-500
						dark:border-gray-600 select-none
						hover:bg-indigo-700 hover:text-white
						dark-hover:text-gray-200">
                        <i class="fa-solid fa-magnifying-glass"></i>
						<span>Demander une réalisation</span>
						</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
