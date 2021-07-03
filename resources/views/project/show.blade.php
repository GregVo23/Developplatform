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

    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Applicant Information
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
            Personal details and application.
        </p>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
            <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
                Full name
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
                Margot Foster
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
            <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">
                Email address
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
                margotfoster@example.com
            </dd>
            </div>
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
                About
            </dt>
            <dd class="mt-1 text-sm text-gray-900">
                Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.
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


    <!--Add specific script-->
    @push('scripts')
        <script src="{{ asset('js/script.js') }}" defer></script>
    @endpush

</x-app-layout>