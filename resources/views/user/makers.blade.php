<x-full-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Makers') }}
        </h2>
    </x-slot>

	<x-message/>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">

                <ul>
                @foreach ($users as $user)
                    <li><a href="{{ route('profil.show', $user->id) }}">{{ $user->firstname." ".$user->lastname }}</a></li>
                @endforeach
                </ul>

            </div>
        </div>
    </div>
</x-full-layout>
