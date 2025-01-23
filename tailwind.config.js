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
 
            keyframes: {
                slideInLeft: {
                    '0%': { transform: 'translateX(-100%)', opacity: '0' },
                    '100%': { transform: 'translateX(0)', opacity: '1' },
                },
                slideInRight: {
                    '0%': { transform: 'translateX(100%)', opacity: '0' },
                    '100%': { transform: 'translateX(0)', opacity: '1' },
                },
                slideInDown: {
                    '0%': { transform: 'translateY(-100%)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                },
                slideInUp: {
                    '0%': { transform: 'translateY(100%)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                },
                slideDownFromSelf: {
                    '0%': {
                      transform: 'scaleY(0)',
                      transformOrigin: 'top',
                      opacity: '0'
                    },
                    '100%': {
                      transform: 'scaleY(1)',
                      transformOrigin: 'top',
                      opacity: '1'
                    }
                  },
                slideRightFromSelf: {
                    '0%': {
                      transform: 'scaleX(0) translateX(100%)',
                      transformOrigin: 'right',
                      opacity: '0'
                    },
                    '100%': {
                      transform: 'scaleX(1) translateX(0)',
                      transformOrigin: 'right',
                      opacity: '1'
                    }
                },
                slideLeftFromSelf: {
                    '0%': {
                      transform: 'scaleX(0) translateX(-100%)',
                      transformOrigin: 'left',
                      opacity: '0'
                    },
                    '100%': {
                      transform: 'scaleX(1) translateX(0)',
                      transformOrigin: 'left',
                      opacity: '1'
                    }
                }
            },
            animation: {
                slideInLeft: 'slideInLeft 0.6s ease-out forwards',
                slideInRight: 'slideInRight 0.6s ease-out forwards',
                slideInDown: 'slideInDown 0.6s ease-out forwards',
                slideInUp: 'slideInUp 0.6s ease-out forwards',
                slideDownFromSelf: 'slideDownFromSelf 0.6s cubic-bezier(0.4, 0, 0.2, 1)',
                slideRightFromSelf: 'slideRightFromSelf 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards',
                slideLeftFromSelf: 'slideLeftFromSelf 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards'
            },
        },
    },

    plugins: [forms],
};