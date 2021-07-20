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
        
        {{ $button }}

    </span>
</button>
