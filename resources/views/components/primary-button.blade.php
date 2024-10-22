<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 dark:bg-primary-700 bg-primary-500 border border-transparent rounded-md font-semibold text-xs text-gray-800 dark:text-gray-50 uppercase tracking-widest hover:bg-primary-700 dark:hover:bg-primary-800 focus:bg-primary-700 dark:focus:bg-primary-800 active:bg-primary-600 dark:active:bg-primary-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
