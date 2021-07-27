<script>

  // 1. css in js
  /*
  let lastKnownScrollPosition = 0;
  let ticking = false;
  let footer = document.querySelector('#footer');

  function doSomething(scrollPos) {

    let position = window.pageYOffset;

    if(position === 0){
      document.querySelector('#sidebar').style.position = 'fixed';
      document.querySelector('#sidebar').style.width = '30%';
      document.querySelector('#sidebar').style.transition = 'background-color 0.3s ease';
      document.querySelector('#sidebar').style.backgroundColor = 'white';
      document.querySelector('#sidebar').style.display = 'flex';
    }
    if(position>10){

      document.querySelector('#sidebar').style.position = 'fixed';
      document.querySelector('#sidebar').style.width = '30%';
      document.querySelector('#sidebar').style.transition = 'background-color 0.3s ease';
      document.querySelector('#sidebar').style.backgroundColor = 'transparent';
      document.querySelector('#sidebar').style.display = 'flex';
    }
    if(position>30){

      document.querySelector('#sidebar').style.display = 'none';

    }
    if(position>300){

      document.querySelector('#sidebar').style.display = 'flex';
      document.querySelector('#sidebar').style.width = '30%';

    }
    if(position>350){
      document.querySelector('#sidebar').style.position = 'fixed';
      document.querySelector('#sidebar').style.width = '30%';
      document.querySelector('#sidebar').style.transition = 'background-color 0.4s ease';
      document.querySelector('#sidebar').style.backgroundColor = 'white';
    }
  }

  document.addEventListener('scroll', function(e) {
    lastKnownScrollPosition = window.scrollY;

    if (!ticking) {
      window.requestAnimationFrame(function() {
        doSomething(lastKnownScrollPosition);
        ticking = false;
      });

      ticking = true;
    }
  });
}
*/
</script>

<!-- This example requires Tailwind CSS v2.0+ -->


<nav class="space-y-1" aria-label="Sidebar" x-data="{categories: false}">
    <livewire:search/>

  <h3>Les catégories</h3>

  @if(session()->get('categories') !== NULL)

    @foreach (session()->get('categories') as $category)

    <a href="#" @click.prevent ="categories = !categories" class="bg-gray-100 text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md" aria-current="page">
        <!--
        Heroicon name: outline/home

        Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500"
        -->
        <!-- Heroicon name: outline/folder -->
        <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
        </svg>
        <span class="truncate">
        {{ $category->name }}
        </span>
    </a>

        @foreach ($category->sub_category as $sub_category)

        <a
        x-cloak
        x-show="categories"
        x-transition:enter="ease-in-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in-out duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
        <!-- Heroicon name: outline/users -->
        <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
        </svg>
        <span class="truncate">

            {{ $sub_category->name ? $sub_category->name : "Pas de sous-catégories" }}

        </span>
        </a>

        @endforeach

    @endforeach

  @endif

    <!-- Navigation Links -->
    <x-menu/>

</nav>
