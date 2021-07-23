<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!--show if errors-->
    @if($errors->any())

      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
      </div>

    @endif
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
        </div>

        <div class="flex-shrink-0 ml-4">
            <a href="{{ asset('project/cover/'.$project->picture) }}" target="about_blank">
            <img
            class="h-56 w-56 rounded object-cover"
            src="{{ asset('project/cover/'.$project->picture) }}"
            alt="infamous" />
            </a>
        </div>
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

        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">

        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
            <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
                Demandeur
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
                {{ $name }}
            </dd>
            </div>
            <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
                Application for
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
                Backend Developer
            </dd>
            </div>
            @isset($project->email)
                <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    Adresse email
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                    {{ $project->email }}
                </dd>
                </div>
            @endisset
            <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
                Salary expectation
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
                $120,000
            </dd>
            </div>
            <div class="sm:col-span-2">
            <dt class="text-sm font-medium text-gray-500">
                Attachments
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
                <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                    <div class="w-0 flex-1 flex items-center">
                    <!-- Heroicon name: solid/paper-clip -->
                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                    </svg>
                    <span class="ml-2 flex-1 w-0 truncate">
                        resume_back_end_developer.pdf
                    </span>
                    </div>
                    <div class="ml-4 flex-shrink-0">
                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Download
                    </a>
                    </div>
                </li>
                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                    <div class="w-0 flex-1 flex items-center">
                    <!-- Heroicon name: solid/paper-clip -->
                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                    </svg>
                    <span class="ml-2 flex-1 w-0 truncate">
                        coverletter_back_end_developer.pdf
                    </span>
                    </div>
                    <div class="ml-4 flex-shrink-0">
                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Download
                    </a>
                    </div>
                </li>
                </ul>
            </dd>
            </div>
        </dl>
    </div>

    <section class="mb-6" x-data="{open: false}">

    <div class="flex justify-evenly">

        <div class="flex justify-center">
            <div class="flex bg-grey-lighter">
              <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-gray-700 rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                  </svg>
                  <span class="mt-2 text-base leading-normal text-center">Accepter le projet</span>
                  <a href="#" ></a>
              </label>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="flex bg-grey-lighter" @click.prevent ="open = !open">
              <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-gray-700 rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-gray-900">
                  <svg xmlns="http://www.w3.org/2000/svg" x-show="!open" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" x-show="open" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                  </svg>
                  <span class="mt-2 text-base leading-normal text-center">Faire une offre</span>
                  <a href="#" ></a>
              </label>
            </div>
        </div>

    </div>

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
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 sm:text-sm">
                      €
                    </span>
                  </div>
                  <input type="text" name="price" id="price" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00" aria-describedby="price-currency">
                  <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 sm:text-sm" id="price-currency">
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
                  <label for="message" class="block text-sm font-medium text-warm-gray-900">Message</label>
                  <span id="message-max" class="text-sm text-warm-gray-500">Max. 500 characters</span>
                </div>
                <div class="mt-1">
                  <textarea id="message" name="message" rows="4" class="py-3 px-4 block w-full shadow-sm text-warm-gray-900 focus:ring-teal-500 focus:border-indigo-500 border border-gray-300 rounded-md" aria-describedby="message-max"></textarea>
                </div>
              </div>

    </section>



    <!--Add specific script-->
    @push('scripts')
        <script src="{{ asset('js/script.js') }}" defer></script>
    @endpush

</x-app-layout>
