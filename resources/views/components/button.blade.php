<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-5 pt-4 pb-3.5 bg-gray-800 border border-transparent rounded-full font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-200 transform hover:-translate-y-1 hover:translate-x-0.5']) }}>
    {{ $slot }}
</button>
