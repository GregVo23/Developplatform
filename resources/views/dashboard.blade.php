<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if (!empty($message))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>message</strong>
    </div>
    @endif
    @if (!empty($success))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>success</strong>
    </div>
    @endif

	<x-message/>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                <span>Chercher un projet</span>
                            </button>
                        </div>
                        <div class="flex mx-2">
                            <a href="{{ route('project.create') }}">
                                <button
                                    class="flex items-center
                                    focus:outline-none border rounded-full
                                    py-2 px-6 leading-none border-gray-500
                                    dark:border-gray-600 select-none
                                    hover:bg-indigo-700 hover:text-white
                                    dark-hover:text-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    <span>Ajouter un projet</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex">
        <div class="flex-shrink w-2/4">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_NmBGIS.json"  background="transparent"  speed="1"  style="width: 80%;"  loop  autoplay></lottie-player>
            <!--<lottie-player src="https://assets3.lottiefiles.com/private_files/lf30_wwq2op12.json"  background="transparent"  speed="1"  style="width: 60%;"  loop  autoplay></lottie-player>-->
        </div>
        <div class="flex-grow">
            <div class="p-6 bg-white">
                <h3 class="mx-2 text-xl text-gray-700">
                    Mes <b>notifications</b> récentes
                </h3>

                <!--TODO-->
                <p class="mx-2 mt-2 text-gray-500">Je n'ai pas de notification</p>

                <div class="mt-4 flex">
                    <div class="flex mx-2">
                        <button
                            class="flex items-center
                            focus:outline-none border rounded-full
                            py-2 px-6 leading-none border-gray-500
                            dark:border-gray-600 select-none
                            hover:bg-indigo-700 hover:text-white
                            dark-hover:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <span>Mes messages</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
