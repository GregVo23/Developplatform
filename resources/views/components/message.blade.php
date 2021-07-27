@if ($message = Session::get('success'))
<div class="fixed inset-x-0 bottom-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end z-50">
    <div
      x-data="{ show: false }"
          x-init="() => {
            setTimeout(() => show = true, 500);
            setTimeout(() => show = false, 5000);
          }"
      x-show="show"
      x-description="Notification panel, show/hide based on alert state."
      @click.away="show = false"
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="opacity-0 transform scale-90"
      x-transition:enter-end="opacity-100 transform scale-100"
      x-transition:leave="transition ease-in duration-300"
      x-transition:leave-start="opacity-100 transform scale-100"
      x-transition:leave-end="opacity-0 transform scale-90"
        class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto">
      <div class="rounded-lg shadow-xs overflow-hidden">
        <div class="p-4">
          <div class="flex items-start">
            <div class="flex-shrink-0">
            </div>
            <div class="ml-3 w-0 flex-1 pt-0.5">
              <p class="text-sm leading-5 font-medium text-gray-900">
                {{ Session::get('success') }}
              </p>
            </div>
            <div class="ml-4 flex-shrink-0 flex">
              <button @click="show = false" class="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                  fermer
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endif


@if(Session::has('message') || Session::has('success'))
    @if(Session::has('message'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"> <p>{{ Session::get('message') }}</p>
    @else
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert"> <p>{{ Session::get('success') }}</p>
    @endif
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 @if(Session::has('message')) {{ 'text-red-500' }} @else {{ 'text-green-700' }} @endif" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>
@endif
