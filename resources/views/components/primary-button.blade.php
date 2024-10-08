<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-5 py-3 bg-indigo-600 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-indigo-500 dark:hover:bg-white focus:bg-indigo-400 dark:focus:bg-white active:bg-indigo-700 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
