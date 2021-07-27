
@if(Session::has('message') || Session::has('success'))
    @if(Session::has('message'))
        <div x-data="{ show: false }"
        x-init="() => {
            setTimeout(() => show = true, 500);
            setTimeout(() => show = false, 6000);
        }"
        x-cloak
        x-show="show"
        x-description="Notification panel, show/hide based on alert state."
        @click.away="show = false"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"> <p>{{ Session::get('message') }}</p>
    @else
        <div x-data="{ show: false }"
            x-init="() => {
            setTimeout(() => show = true, 500);
            setTimeout(() => show = false, 6000);
            }"
            x-cloak
            x-show="show"
            x-description="Notification panel, show/hide based on alert state."
            @click.away="show = false"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert"> <p>{{ Session::get('success') }}</p>
    @endif
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <button @click="show = false" class="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </span>
        </div>
@endif

