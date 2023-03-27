const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    // make sure to safelist these classes when using purge
    safelist: [
        'w-64',
        'w-1/2',
        'rounded-l-lg',
        'rounded-r-lg',
        'bg-gray-200',
        'grid-cols-4',
        'grid-cols-7',
        'h-6',
        'leading-6',
        'h-9',
        'leading-9',
        'shadow-lg'
    ],

    // enable dark mode via class strategy
    darkMode: 'class',
    // darkMode: 'media',
    // ...
    theme: {
        screens: {
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1280px',
        },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    variants: {
        backgroundColor: ['responsive', 'hover', 'focus', 'active', 'checked', 'odd'],
        // ...
        tableLayout: ['responsive', 'hover', 'focus'],
        // ...
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        // include Flowbite as a plugin in your Tailwind CSS project
        require('flowbite/plugin')
    ],
};
