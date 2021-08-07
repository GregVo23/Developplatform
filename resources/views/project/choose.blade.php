<x-full-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Choose') }}
        </h2>
    </x-slot>

    <!--content-->
    <div class="flex justify-evenly">
        <div>
            <img class="filter grayscale object-cover shadow-lg rounded-xl" src="{{ asset('images/categories/c1.jpg') }}">
            <div class="mt-4 text-lg leading-6 font-medium space-y-1">
                <h3>Lindsay Walton</h3>
                <p class="text-indigo-600">Front-end Developer</p>
            </div>
        </div>
        <div>
            <img class="filter grayscale object-cover shadow-lg rounded-xl" src="{{ asset('images/categories/c2.jpg') }}">
            <div class="mt-4 text-lg leading-6 font-medium space-y-1">
                <h3>Lindsay Walton</h3>
                <p class="text-indigo-600">Front-end Developer</p>
            </div>
        </div>
    </div>


    <div class="m-12 p-12 text-center">
        <h3 class="font-weight-bolder h1 mb-4">Designer & Developer, to make your <span class="gradient-text gradient-horizon">projets</span></h3>
        <p class="mb-5 text-xl font-light text-black-50 font-weight-extralight">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum, atque. Minus, harum porro unde quisquam! Minima vitae neque hic vel porro quidem totam.</p>
    </div>

</x-full-layout>
