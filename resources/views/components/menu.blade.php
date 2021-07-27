    <!-- Navigation Links -->
    <ul class="mt-4 space-y-4">
        <li><a class="text-gray-500 hover:text-indigo-500" href="{{ route('dashboard')}}">
            {{ __('Accueil') }}</a>
        </li>
        <li><a class="text-gray-500 hover:text-indigo-500" href="{{ route('projects.index')}}">
            {{ __('Rechercher') }}</a>
        </li>
        <li><a class="text-gray-500 hover:text-indigo-500" href="{{route('project.create')}}">
            {{ __('Demander') }}</a>
        </li>
        <li><a class="text-gray-500 hover:text-indigo-500" href="{{route('favoris.index', Auth()->user()->id)}}">
            {{ __('Favoris') }}</a>
        </li>
        <li><a class="text-gray-500 hover:text-indigo-500" href="{{route('projects.mine', Auth()->user()->id)}}">
            {{ __('Mes demandes') }}</a>
        </li>
        <li><a class="text-gray-500 hover:text-indigo-500" href="{{route('projects.maked.mine', Auth()->user()->id)}}">
            {{ __('Mes offres') }}</a>
        </li>
    </ul>
