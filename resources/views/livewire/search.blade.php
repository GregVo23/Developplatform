<div x-data="{ open: true }">
    <input @click.away="{ open = false; @this.resetIndex() }" @click="{ open = true }" class="relative border leading-none border-gray-500
    dark:border-gray-600 select-none block w-full bg-white bg-opacity-20 py-2 pl-10 pr-3 rounded-md mb-6 text-gray-900 placeholder-gray-400 focus:outline-none focus:bg-opacity-100 focus:border-transparent focus:placeholder-gray-700 focus:ring-0 sm:text-sm" placeholder="Recherche par mot clé" type="search" name="search"
    wire:model="search"
    wire:keydown.arrow-down.prevent = "incrementIndex"
    wire:keydown.arrow-up.prevent = "decrementIndex"
    wire:keydown.backspace = "resetIndex"
    wire:keydown.enter.prevent = "showProject">
    <svg class="w-6 h-6 text-gray-400 absolute top-8 pl-2" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
    </svg>
    @if (strlen($search) > 2)
        <div x-show="open">
            @if (count($projects) > 0)
                @foreach ($projects as $index => $project)
                    <a href="{{ route('project.show', $project->id) }}"><p class="p-1 {{ ($index === $selectedIndex) ? 'text-indigo-600' : '' }}">{{ $project->name }}</p></a>
                @endforeach
            @else
            <span class="text-red-600">0 résultats</span>
            @endif
        </div>
    @endif
</div>
