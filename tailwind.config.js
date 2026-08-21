import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import plugin from 'tailwindcss/plugin';

/** @type {import('tailwindcss').Config} */
export default {
    future: {
        hoverOnlyWhenSupported: true,
    },
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                heading: ['"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
                barlow: ['"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans], // Fallback for old custom class
            },
            colors: {
                emerald: {
                    50: '#FFF7F0',
                    100: '#FFEFE0',
                    200: '#FFD5B8',
                    300: '#FFAE7A',
                    400: '#FF873D',
                    500: '#FF6A00',
                    600: '#E65F00',
                    700: '#B34A00',
                    800: '#803500',
                    900: '#4D2000',
                    950: '#331500',
                }
            }
        },
    },

    plugins: [
        forms,
        plugin(function({ addVariant }) {
            // Restrict hover effects to screens 1024px and wider
            addVariant('hover', '@media (min-width: 1024px) { &:hover }');
            addVariant('group-hover', '@media (min-width: 1024px) { .group:hover & }');
            addVariant('peer-hover', '@media (min-width: 1024px) { .peer:hover ~ & }');
        })
    ],
};

