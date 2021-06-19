<div class="max-w-4xl mx-auto px-2 sm:px-6 lg:max-w-full lg:px-8">
    <div class="relative py-5 flex items-center justify-center lg:justify-between">




        <!-- Logo -->
        <div class="absolute left-0 flex-shrink-0 lg:static">
        <a href="{{ url('/') }}">
            <span class="sr-only">Workflow</span>
            <img class="h-8 w-auto" src="{{ asset('images/logo.svg') }}" alt="Workflow">
        </a>
        </div>

        <!-- Right section on desktop -->
        <div class="hidden lg:ml-4 lg:flex lg:items-center lg:pr-0.5">
        <button type="button" class="flex-shrink-0 p-1 text-indigo-200 rounded-full hover:text-white hover:bg-white hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-white">
            <span class="sr-only">View notifications</span>
            <!-- Heroicon name: outline/bell -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
        </button>

        <!-- Profile dropdown -->
        <div class="ml-4 relative flex-shrink-0">
            <div>
            <button type="button" class="bg-white rounded-full flex text-sm ring-2 ring-white ring-opacity-20 focus:outline-none focus:ring-opacity-100" id="user-menu" aria-expanded="false" aria-haspopup="true">
                <span class="sr-only">Open user menu</span>
                <img class="h-8 w-8 rounded-full" src="{{ asset('images/profil.png') }}" alt="">
            </button>
            </div>

            <!--
            Dropdown menu, show/hide based on menu state.

            Entering: ""
                From: ""
                To: ""
            Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
            <div class="origin-top-right z-40 absolute -right-2 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
            <a href="{{ route('profil') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Mon Profil</a>
            <form name="frmLogout" method="post" action="{{ route('logout') }}">
                @csrf
                @method('POST')
            <input type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" placeholder="Sign out" value="Déconnexion">
            </form>
        </div>
        </div>
        </div>

        <!-- Search -->
        <div class="flex-1 min-w-0 px-12 lg:hidden">
        <div class="max-w-xs w-full mx-auto">
            <label for="search" class="sr-only">Search</label>
            <div class="relative text-white focus-within:text-gray-600">
            <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                <!-- Heroicon name: solid/search -->
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
            </div>
            <input id="search" class="block w-full bg-white bg-opacity-20 py-2 pl-10 pr-3 border border-transparent rounded-md leading-5 text-gray-900 placeholder-white focus:outline-none focus:bg-opacity-100 focus:border-transparent focus:placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="Search" type="search" name="search">
            </div>
        </div>
        </div>

        <!-- Menu button -->
        <div class="absolute right-0 flex-shrink-0 lg:hidden">
        <!-- Mobile menu button -->
        <button type="button" class="bg-transparent p-2 rounded-md inline-flex items-center justify-center text-indigo-200 hover:text-white hover:bg-white hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-white" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <!--
            Heroicon name: outline/menu

            Menu open: "hidden", Menu closed: "block"
            -->
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!--
            Heroicon name: outline/x

            Menu open: "block", Menu closed: "hidden"
            -->
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        </div>
    </div>




    <div class="hidden lg:block border-t border-white border-opacity-20 py-5">
        <div class="grid grid-cols-3 gap-8 items-center">
        <div class="col-span-2">
            <nav class="flex space-x-4">
            <a href="#" class="text-white text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10" aria-current="page">
                Accueil
            </a>

            <a href="#" class="text-back-1000 text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10" aria-current="false">
                Mon profil
            </a>

            <a href="#" class="text-back-1000 text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10" aria-current="false">
                Resources
            </a>

            <a href="#" class="text-back-1000 text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10" aria-current="false">
                Company Directory
            </a>

            <a href="#" class="text-back-1000 text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10" aria-current="false">
                Openings
            </a>
            </nav>
        </div>
        <div>
            <div class="max-w-md w-full mx-auto">
            <label for="search" class="sr-only">Search</label>
            <div class="relative text-white focus-within:text-gray-600">
                <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                <!-- Heroicon name: solid/search -->
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
                </div>
                <input id="search" class="block w-full bg-white bg-opacity-20 py-2 pl-10 pr-3 border border-transparent rounded-md leading-5 text-gray-900 placeholder-white focus:outline-none focus:bg-opacity-100 focus:border-transparent focus:placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="Search" type="search" name="search">
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>

    <!-- Mobile menu, show/hide based on mobile menu state. -->
    <div class="lg:hidden">
    <!--
        Mobile menu overlay, show/hide based on mobile menu state.

        Entering: "duration-150 ease-out"
        From: "opacity-0"
        To: "opacity-100"
        Leaving: "duration-150 ease-in"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="z-20 fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>

    <!--
        Mobile menu, show/hide based on mobile menu state.

        Entering: "duration-150 ease-out"
        From: "opacity-0 scale-95"
        To: "opacity-100 scale-100"
        Leaving: "duration-150 ease-in"
        From: "opacity-100 scale-100"
        To: "opacity-0 scale-95"
    -->
    <div class="z-30 absolute top-0 inset-x-0 max-w-3xl mx-auto w-full p-2 transition transform origin-top">
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y divide-gray-200">
        <div class="pt-3 pb-2">
            <div class="flex items-center justify-between px-4">
            <div>
                <img class="h-8 w-auto" src="{{ asset('images/logo.svg') }}" alt="Workflow">
            </div>
            <div class="-mr-2">
                <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                <span class="sr-only">Close menu</span>
                <!-- Heroicon name: outline/x -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                </button>
            </div>
            </div>
            <div class="mt-3 px-2 space-y-1">
            <a href="#" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Home</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Profile</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Resources</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Company Directory</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Openings</a>
            </div>
        </div>
        <div class="pt-4 pb-2">
            <div class="flex items-center px-5">
            <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixqx=YOwCbLlyty&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </div>
            <div class="ml-3 min-w-0 flex-1">
                <div class="text-base font-medium text-gray-800 truncate">Rebecca Nicholas</div>
                <div class="text-sm font-medium text-gray-500 truncate">rebecca.nicholas@example.com</div>
            </div>
            <button class="ml-auto flex-shrink-0 bg-white p-1 text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="sr-only">View notifications</span>
                <!-- Heroicon name: outline/bell -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
            </button>
            </div>
            <div class="mt-3 px-2 space-y-1">
            <a href="#" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Your Profile</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Settings</a>
            <a href="{{ route('logout') }}" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Sign out</a>
            </div>
        </div>
        </div>
    </div>
    </div>