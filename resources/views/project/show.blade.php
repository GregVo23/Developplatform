<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!--show if errors-->
    <x-error/>
    
    <!--content-->

    <div class="px-4 py-5 sm:px-6 flex">
        <div class="flex-grow">

            <h2 class="mt-4 text-xl leading-6 font-medium text-gray-900">
                {{ $project->name }}
            </h2>
            <h5 class="mt-8 max-w-2xl text-sm text-gray-500 font-bold">Description:</h5>
            <p class="mt-1 text-sm text-gray-900">
                {{ $project->about }}
            </p>

            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2 mt-6">

                @isset($project->price)
                    <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        <b>Prix annoncé</b>
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $project->price }} €
                    </dd>
                    </div>
                @endisset
                    <div class="sm:col-span-1">
                @isset($project->deadline)
                    <dt class="text-sm font-medium text-gray-500">
                        <b>Date de réalisation</b>
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $project->deadline }}
                    </dd>
                    </div>
                @endisset
            </dl>

        </div>

        <div class="flex-shrink-0 ml-4">

            <a href="{{ asset($picture_path.''.$project->picture) }}" target="about_blank">
            <img
            class="h-56 w-56 rounded object-cover"
            src="{{ asset('project/cover/'.$project->picture) }}"
            alt="{{ $project->name }}" />
            </a>
        </div>
    </div>

        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">

        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">


            <div class="sm:col-span-2">
            <dt class="text-sm font-medium text-gray-500">
                Pièces-jointes
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
                @if(empty($documents))

                    <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">Pas de pièce-jointe</li>
                @else
                    @foreach ($documents as $document)

                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                        <div class="w-0 flex-1 flex items-center">
                        <!-- Heroicon name: solid/paper-clip -->
                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                        </svg>
                        <span class="ml-2 flex-1 w-0 truncate">
                            {{ $document }}
                        </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                        <a href="{{ asset($document_path.''.$document) }}" target="about_blank" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Télécharger
                        </a>
                        </div>
                    </li>
                    @endforeach
                @endif

                </ul>
            </dd>
            </div>
        </dl>
    </div>

    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
        <p class="text-sm font-medium text-gray-500"><b>Notifications</b>: {{ $project->notifications ? "autorisées sur l'adresse email ".$project->email : "refusées " }}</p>
    </div>

    <div class="mt-1 px-4 py-5 sm:px-6">

        <p class="mt-8 max-w-2xl text-sm text-gray-500">
        <b>Catégorie:</b> {{ $project->category->name }}</p><p class="text-gray-400 text-sm mt-2">{{ $project->category->description }}</p>
                <!--($projects[0]->user[0]->pivot->price)-->
                <!--($projects[0]->category[0]->pivot)-->
        </p>
        <p class="mt-2 max-w-2xl text-sm text-gray-500">
            <b>Sous-Catégorie:</b> {{ $project->sub_category->name }}</p><p class="text-gray-400 text-sm mt-2">{{ $project->sub_category->description }}</p>
        </p>

    </div>

    <section class="mb-6" x-data="{open: false}">

    <div class="flex justify-evenly">

        @if ($project->user_id != Auth()->user()->id)

        <form name="frmAccept" method="post" action="{{ route('project.accept', $project->id) }}">
            @csrf
            <button class="flex justify-center">
                <span class="flex bg-grey-lighter">
                <span class="w-64 flex flex-col items-center px-4 py-6 bg-white text-gray-700 rounded-lg shadow-lg uppercase border border-blue cursor-pointer hover:bg-blue hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span class="mt-2 text-base leading-normal text-center">Accepter le projet</span>
                </span>
                </span>
            </button>
        </form>

        <div class="flex justify-center">
            <span class="flex bg-grey-lighter" @click.prevent ="open = !open">
              <span class="w-64 flex flex-col items-center px-4 py-6 bg-white text-gray-700 rounded-lg shadow-lg uppercase border border-blue cursor-pointer hover:bg-blue hover:text-gray-900">
                  <svg xmlns="http://www.w3.org/2000/svg" x-show="!open" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" x-show="open" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                  </svg>
                  <span class="mt-2 text-base leading-normal text-center">Faire une offre</span>
              </span>
            </span>
        </div>

        @else

        <div class="flex justify-center">
            <span class="flex bg-grey-lighter">
              <span class="w-64 flex flex-col items-center px-4 py-6 bg-white text-gray-700 rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                    <path d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                </svg>
                  <span class="mt-2 text-base leading-normal text-center">Modifier mon projet</span>
                  <a href="#" ></a>
              </span>
            </span>
        </div>

        <form name="frmDelete" method="get" action="{{ route("project.destroy", $project->id) }}">
            @csrf
            <button class="flex justify-center">
                <span class="flex bg-grey-lighter">
                <span class="w-64 flex flex-col items-center px-4 py-6 bg-white text-gray-700 rounded-lg shadow-lg uppercase border border-blue cursor-pointer hover:bg-blue hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <span class="mt-2 text-base leading-normal text-center">Supprimer mon projet</span>
                </span>
                </span>
            </button>
        </form>

        @endif

    </div>
    <form method="POST" action="{{ route('project.offer', $project->id) }}" name="frmNegociation">
        @csrf
        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

            <div class="col-span-6 sm:col-span-6"
            x-show="open"
            x-transition:enter="ease-in-out duration-500"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in-out duration-500"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">
                <div>
                <label for="amount" class="block text-sm font-medium text-gray-700">Proposition de prix</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 sm:text-sm">
                      €
                    </span>
                  </div>
                  <input type="text" name="amount" id="amount" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00" required aria-describedby="amount-currency">
                  <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 sm:text-sm" id="amount-currency">
                      EUR
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-span-6 sm:col-span-6"
            x-show="open"
            x-transition:enter="ease-in-out duration-500"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in-out duration-500"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">
                <div class="flex justify-between">
                  <label for="information" class="block text-sm font-medium text-warm-gray-900">Description proposition</label>
                  <span id="information-max" class="text-sm text-warm-gray-500">Max. 1000 charactères</span>
                </div>
                <div class="mt-1">
                  <textarea id="information" name="information" rows="4" class="py-3 px-4 block w-full shadow-sm text-warm-gray-900 focus:ring-teal-500 focus:border-indigo-500 border border-gray-300 rounded-md" required aria-describedby="information-max"></textarea>
                </div>
              </div>

              <button
              x-show="open"
              x-transition:enter="ease-in-out duration-500"
              x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100"
              x-transition:leave="ease-in-out duration-500"
              x-transition:leave-start="opacity-100"
              x-transition:leave-end="opacity-0"
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
                    {{ "Faire la proposition" }}
                </span>
            </button>
        </div>
    </section>



    <!--Add specific script-->
    @push('scripts')
        <script src="{{ asset('js/script.js') }}" defer></script>
    @endpush

</x-app-layout>
