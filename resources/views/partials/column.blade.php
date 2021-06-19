<!-- This example requires Tailwind CSS v2.0+ -->
<nav class="space-y-1" aria-label="Sidebar">
  <input id="search" class="border leading-none border-gray-500
  dark:border-gray-600 select-none block w-full bg-white bg-opacity-20 py-2 pl-10 pr-3 rounded-md mb-6 text-gray-900 placeholder-gray-500 focus:outline-none focus:bg-opacity-100 focus:border-transparent focus:placeholder-gray-700 focus:ring-0 sm:text-sm" placeholder="Search" type="search" name="search">
  <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
  
  @foreach (session()->get('categories') as $category)
  
  <a href="#" class="bg-gray-100 text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md" aria-current="page">
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

    <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
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

</nav>
