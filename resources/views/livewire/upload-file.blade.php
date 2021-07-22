<div>

    <div class="w-1/2">
        @if ($picture)
            <img src="{{ $picture->temporaryUrl() }}">
        @endif
    </div>

    @error('picture') <span class="error">{{ $message }}</span> @enderror

    <label for="picture" class="block text-sm font-medium text-gray-700">
        Photo de couverture
        </label>
        <div class="flex bg-grey-lighter">
            <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-gray-700 rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                </svg>
                <span class="mt-2 text-base leading-normal">Choisir une photo</span>
                <input type='file' class="hidden" wire:model="picture" name="picture"/>
            </label>
        </div>
</div>
