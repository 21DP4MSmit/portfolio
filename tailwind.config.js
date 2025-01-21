import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#1A202C', // Dark theme color
                secondary: '#EDF2F7', // Light background
                accent: '#38B2AC',
            },
            spacing: {
                128: '32rem',
                144: '36rem',
            },
            screens: {
                xs: '475px',
            },
        },
    },

    plugins: [forms],
};
