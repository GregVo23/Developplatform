<div>
    <div class="flex mt-2 flex-col">
        <div class="flex justify-items-stretch">

            <div class="flex-col w-1/3 mx-1">
                <select wire:model.lazy="category_id" id="Selectcategory" name="Selectcategory" class="w-full mt-1 block pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="">Filtre par catégorie</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex-col w-1/3 mx-1">
                <select wire:model.lazy="sub_category_id" id="SelectSubCategory" name="SelectSubCategory" class="w-full mt-1 block pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="">Filtre par sous-catégorie</option>
                    @foreach ($subCategories as $subCategory)
                        <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex-col w-1/3 mx-1">
                <input class="mt-1 relative border leading-none border-gray-500
                dark:border-gray-600 select-none block w-full bg-white bg-opacity-20 py-2 pl-10 pr-3 rounded-md mb-6 text-gray-900 placeholder-gray-400 focus:outline-none focus:bg-opacity-100 focus:border-transparent focus:placeholder-gray-700 focus:ring-0 sm:text-sm" placeholder="Filtre par mot clé" type="FilterSearch" name="FilterSearch"
                wire:model="query">
            </div>

        </div>
        <div class="flex justify-items-end">

            <div class="flex ml-1">
                <select wire:model.lazy="perPage" id="nbPage" name="nBpage" class="w-24 mt-1 block pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    @for ($i = 5; $i <= 25; $i += 5)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                <label for="nbPage" class="mt-2 ml-2">

                    @if ($rendering === "projects")
                        Projets
                    @elseif ($rendering === "favorite")
                        Favoris
                    @elseif ($rendering === "mine")
                        Demandes
                    @else
                        Projets
                    @endif

                par page</label>
            </div>
        </div>
    </div>

    @foreach ($projects as $project)

    <div class="flex flex-col mt-2 flex-grow">
        <div class="flex-grow mt-2">
            <div
            class="flex-grow w-full items-center justify-between bg-white
            dark:bg-gray-800 px-8 py-6 border-l-2 border-indigo-700
            dark:border-indigo-300">
            <!-- card -->
            <div class="flex justify-between">
                <div class="flex-none">
                    <img
                    class="h-36 w-36 rounded object-cover"
                    src="{{ asset('project/cover/'.$project->picture) }}"
                    alt="{{ $project->name }}" />
                </div>

                <div class="flex-grow ml-6">

                <span class="text-lg font-bold">
                    @if ($rendering == "favorite" || $rendering == "maked")
                    {{ $project->project_id }}
                    @else
                    {{ $project->id }}
                    @endif
                </span>
                <span class="text-lg font-bold">{{ $project->name }}
                </span>
                <p>{{ Str::limit($project->about, 150 , ' ...') }}</p>
                <div class="mt-4 flex">
                    <div class="flex">
                        <svg class="flex-shrink-0 h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    <span
                        class="ml-2 text-sm text-gray-600
                        dark:text-gray-300 capitalize">
                        {{ ($project->liked() != 0) ? $project->liked() : "0" }}
                    </span>
                    </div>

                    @isset($project->price)
                    <div class="flex ml-6">
                        <svg class="flex-shrink-0 h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    <span
                        class="ml-2 text-sm text-gray-600
                        dark:text-gray-300">
                        {{ ($project->price != 0) ? $project->price." €" : "" }}
                    </span>
                    </div>
                    @endisset
                    @if($project instanceof \Illuminate\Database\Eloquent\Collection)
                    @if($project->address() !== NULL)
                    <div class="flex ml-6">
                        <svg class="flex-shrink-0 h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                    <span
                        class="ml-2 text-sm text-gray-600
                        dark:text-gray-300">
                        {{ $project->address() ? $project->address() : "" }}
                    </span>
                    </div>
                    @endif
                    @endif

                    <div class="flex ml-6">
                    <svg
                        class="h-5 w-5 fill-current
                        text-gray-400"
                        viewBox="0 0 24 24"
                        fill="text-gray-400">
                        <path
                        d="M13 2.05v2.02c3.95.49 7 3.85 7
                        7.93 0 3.21-1.92 6-4.72 7.28L13
                        17v5h5l-1.22-1.22C19.91 19.07 22
                        15.76 22
                        12c0-5.18-3.95-9.45-9-9.95M11
                        2c-1.95.2-3.8.96-5.32 2.21L7.1
                        5.63A8.195 8.195 0 0111 4V2M4.2
                        5.68C2.96 7.2 2.2 9.05 2
                        11h2c.19-1.42.75-2.77
                        1.63-3.9L4.2 5.68M6
                        8v2h3v1H8c-1.1 0-2 .9-2
                        2v3h5v-2H8v-1h1c1.11 0 2-.89
                        2-2v-1a2 2 0 00-2-2H6m6
                        0v5h3v3h2v-3h1v-2h-1V8h-2v3h-1V8h-2M2
                        13c.2 1.95.97 3.8 2.22
                        5.32l1.42-1.42A8.21 8.21 0 014
                        13H2m5.11 5.37l-1.43 1.42A10.04
                        10.04 0 0011 22v-2a8.063 8.063 0
                        01-3.89-1.63z"></path>
                    </svg>
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-300">
                        {{ Carbon\Carbon::parse($project->deadline)->diffForHumans() ? Carbon\Carbon::parse($project->deadline)->diffForHumans() : "" }}
                    </span>
                    </div>
                </div>

                <div class="mt-1 text-sm {{ ($project->accepted == true) ? "text-yellow" : "text-indigo-600" }}">
                    @if (!empty($project->proposal && $project->user_id == auth()->user()->id))
                        @if ($project->amount != NULL)
                            Votre proposition de {{ $project->amount }} €
                            @if ($project->accepted == true)
                                a été accepté
                            @elseif($project->accepted == false)
                                a été refusé
                            @else
                                est en attente d'acceptation
                            @endif
                        @else
                            Vous avez accepté ce projet
                            @if ($project->accepted == true)
                                et l'auteur a accepté de travailler avec vous
                            @elseif($project->accepted == false)
                                mais l'auteur du projet a refusé la collaboration
                            @else
                                en attente d'une confirmation de l'auteur du projet
                            @endif
                        @endif
                    @endif
                </div>

                <div class="mt-4 flex justify-end flex-grow">


                        @if($rendering!="mine")

                            @if($project->user_id !== auth()->user()->id || $rendering === "favorite" )
                                <form name="frmFavorite">
                                    @csrf

                                    <!--livewire:favorite-button :id = "$project->id"-->


                                    <button
                                        wire:click.prevent="favorite({{ ($rendering == "favorite") ? $project->project_id : $project->id }})"
                                        class="flex items-center ml-4
                                        focus:outline-none group border rounded-full
                                        py-2 px-6 leading-none border-indigo-700
                                        dark:border-indigo-700 select-none
                                        hover:bg-indigo-700 text-indigo-700 hover:text-white
                                        dark-hover:text-gray-200">

                                        @if($rendering === "favorite")
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        @elseif($project->isFavorite())
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                        @endif

                                        <span class="text-gray-700 group-hover:text-white">

                                            @if($rendering === "favorite")
                                                {{ "Supprimer des Favoris" }}
                                            @elseif($project->isFavorite())
                                                {{ "Supprimer des Favoris" }}
                                            @else
                                                {{ "Ajouter aux favoris" }}
                                            @endif

                                        </span>
                                    </button>

                                    <!--livewire:favorite-button :id = "$project->id"-->

                                </form>
                            @endif

                        @else
                            <form name="frmDelete" method="get" action="{{ route("project.destroy", $project->id) }}">
                                @csrf
                                <button

                                    class="flex items-center ml-4
                                    focus:outline-none group border rounded-full
                                    py-2 px-6 leading-none border-indigo-700
                                    dark:border-indigo-700 select-none
                                    hover:bg-indigo-700 text-indigo-700 hover:text-white
                                    dark-hover:text-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    <span class="text-gray-700 group-hover:text-white">
                                        {{ "Supprimer mon projet" }}
                                    </span>
                                </button>
                            </form>
                        @endif


                    <form method="get" action="{{ route('project.show', $project->id) }}" name="frmShow">
                        @csrf
                        <button
                            class="flex items-center ml-4
                            focus:outline-none group border rounded-full
                            py-2 px-6 leading-none border-yellow
                            dark:border-yellow select-none
                            hover:bg-yellow text-yellow hover:text-white
                            dark-hover:text-gray-200 transition ease-in-out duration-200 transform hover:-translate-y-1 hover:translate-x-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <span class="text-gray-700 group-hover:text-white">
                                {{ "Voir le projet" }}
                            </span>
                        </button>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    @endforeach
    <!--paginate-->
    @if(!$projects instanceof \Illuminate\Database\Eloquent\Collection)
        <div class="flex flex-grow justify-center m-7">
            {{ $projects->links() }}
        </div>
    @endif
</div>
