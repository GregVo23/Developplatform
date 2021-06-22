<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
        <!--content-->
        <!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ]
  }
  ```
-->
<form class="space-y-8 divide-y divide-gray-200" method="POST" action="{{ route('store_project', auth()->user()->id ) }}">
  @csrf
  <div class="space-y-8 divide-y divide-gray-200">
    <div>
      <div>
        <h2 class="pb-4 pt-2 text-xl leading-6 font-medium text-gray-900">
          Mon Nouveau Projet
        </h2>
        <p class="mt-1 text-sm text-gray-500">
          Je rentre via le formulaire <u><b>ci-dessous</b></u> toutes les information liées à ma demande de réalisation de projet.
        </p>
      </div>

      <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <label for="name" class="block text-sm font-medium text-gray-700">
            Titre du projet
          </label>
          <div class="mt-1 flex rounded-md shadow-sm">
            <input type="text" name="name" id="name" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
          </div>
        </div>

        <div class="sm:col-span-6">
          <label for="about" class="block text-sm font-medium text-gray-700">
            Description de la demande
          </label>
          <div class="mt-1">
            <textarea id="about" name="about" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
          </div>
          <p class="mt-2 text-sm text-gray-500">Expliquez ce que vous attendez comme résultat, donnez des exemples.</p>
        </div>

        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
          <label for="price" class="block text-sm font-medium text-gray-700">Prix maximum</label>
          <div class="mt-1 relative rounded-md shadow-sm">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <span class="text-gray-500 sm:text-sm">
                €
              </span>
            </div>
            <input type="number" name="price" id="price" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00" aria-describedby="price-currency">
          </div>
        </div>

        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
          <label for="deadline" class="block text-sm font-medium text-gray-700">Délais</label>
          <input type="date" name="deadline" id="deadline" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>

        <div class="sm:col-span-4">
          <label for="category" class="block text-sm font-medium text-gray-700">
            Catégorie
          </label>
          <div class="mt-1 flex rounded-md shadow-sm">
            <input type="text" name="category" id="category" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
          </div>
        </div>

        <!---->
        <!-- This example requires Tailwind CSS v2.0+ -->
<!--
  Custom select controls like this require a considerable amount of JS to implement from scratch. We're planning
  to build some low-level libraries to make this easier with popular frameworks like React, Vue, and even Alpine.js
  in the near future, but in the mean time we recommend these reference guides when building your implementation:

  https://www.w3.org/TR/wai-aria-practices/#Listbox
  https://www.w3.org/TR/wai-aria-practices/examples/listbox/listbox-collapsible.html
-->
<div>
  <label id="listbox-label" class="block text-sm font-medium text-gray-700">
    Assigned to
  </label>
  <div class="mt-1 relative">
    <button type="button" class="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
      <span class="block truncate">
        Tom Cook
      </span>
      <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
        <!-- Heroicon name: solid/selector -->
        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
      </span>
    </button>

    <!--
      Select popover, show/hide based on select state.

      Entering: ""
        From: ""
        To: ""
      Leaving: "transition ease-in duration-100"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <ul class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm" tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-3">
      <!--
        Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

        Highlighted: "text-white bg-indigo-600", Not Highlighted: "text-gray-900"
      -->
      <li class="text-gray-900 cursor-default select-none relative py-2 pl-8 pr-4" id="listbox-option-0" role="option">
        <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
        <span class="font-normal block truncate">
          Wade Cooper
        </span>

        <!--
          Checkmark, only display for selected option.

          Highlighted: "text-white", Not Highlighted: "text-indigo-600"
        -->
        <span class="text-indigo-600 absolute inset-y-0 left-0 flex items-center pl-1.5">
          <!-- Heroicon name: solid/check -->
          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
          </svg>
        </span>
      </li>

      <!-- More items... -->
    </ul>
  </div>
</div>
        <!---->

        <div class="sm:col-span-4">
          <label for="subcategory" class="block text-sm font-medium text-gray-700">
            Sous catégorie
          </label>
          <div class="mt-1 flex rounded-md shadow-sm">
            <input type="text" name="subcategory" id="subcategory" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
          </div>
        </div>

        <div class="sm:col-span-6">
          <label for="photo" class="block text-sm font-medium text-gray-700">
            Photo de couverture
          </label>
          <div class="mt-1 flex items-center">
            <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
              <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>
            </span>
            <button type="button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Choisir
            </button>
          </div>
        </div>

        <div class="sm:col-span-6">
          <label for="cover_photo" class="block text-sm font-medium text-gray-700">
            Document (text, pdf, word, excell)
          </label>
          <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
            <div class="space-y-1 text-center">
              <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              <div class="flex text-sm text-gray-600">
                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                  <span>Upload a file</span>
                  <input id="file-upload" name="file-upload" type="file" class="sr-only">
                </label>
                <p class="pl-1">or drag and drop</p>
              </div>
              <p class="text-xs text-gray-500">
                PDF, TXT, Word, Excell, PNG, JPG, GIF up to 10MB
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="pt-8">
      <div>
        <h3 class="text-lg leading-6 font-medium text-gray-900">
          Informations supplémentaires
        </h3>
        <p class="mt-1 text-sm text-gray-500">
          Ces informations seront communiqués au prestataire de votre projet.
        </p>
      </div>

        <div class="sm:col-span-4 pt-6 pb-8">
          <label for="email" class="block text-sm font-medium text-gray-700">
            Votre adresse email (obligatoire)
          </label>
          <div class="mt-1">
            <input id="email" name="email" type="email" class="shadow-sm w-full sm:text-sm border-gray-300 rounded-md " value="{{ auth()->user()->email }}" readonly>
          </div>
        </div>

        <div>
          <h3 class="text-lg leading-6 font-medium text-gray-900">
            Informations optionnelles
          </h3>
          <p class="mt-1 text-sm text-gray-500">
            Renseigner davantage d'informations qui seront également communiqués au prestataire de votre projet.
          </p>
        </div>

        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

        <div class="col-span-6 sm:col-span-4">
          <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
          <input type="text" name="phone" id="phone" autocomplete="phone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>

        <div class="col-span-6 sm:col-span-3">
          <label for="country" class="block text-sm font-medium text-gray-700">Pays</label>
          <select id="country" name="country" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option>Belgique</option>
            <option>France</option>
            <option>Luxembourg</option>
          </select>
        </div>

        <div class="col-span-6">
          <label for="street" class="block text-sm font-medium text-gray-700">Rue</label>
          <input type="text" name="street" id="street_address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>

        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
          <label for="number" class="block text-sm font-medium text-gray-700">Numéro</label>
          <input type="number" name="number" id="number" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>

        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
          <label for="city" class="block text-sm font-medium text-gray-700">Ville</label>
          <input type="text" name="city" id="city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>

        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
          <label for="postalCode" class="block text-sm font-medium text-gray-700">Code postal</label>
          <input type="text" name="postalCode" id="postalCode" autocomplete="postalCode" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>

      </div>

    <div class="pt-8">
      <div>
        <h3 class="text-lg leading-6 font-medium text-gray-900">
          Notifications
        </h3>
        <p class="mt-1 text-sm text-gray-500">
          Indiquez les notifications que vous souhaitez recevoir.
        </p>
      </div>
      <div class="mt-6">
        <fieldset>
          <legend class="text-base font-medium text-gray-900">
            Par Email
          </legend>
          <div class="mt-4 space-y-4">
            <div class="relative flex items-start">
              <div class="flex items-center h-5">
                <input id="comments" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
              </div>
              <div class="ml-3 text-sm">
                <label for="comments" class="font-medium text-gray-700">Offres de prix</label>
                <p class="text-gray-500">Me notifier si je recois une offre de prix pour mon projet.</p>
              </div>
            </div>
          </div>
        </fieldset>
      </div>
    </div>
  </div>

  <div class="pt-5">
    <div class="flex justify-end">
      <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Annuler
      </button>
      <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Enregistrer le projet
      </button>
    </div>
  </div>
</form>

</x-app-layout>