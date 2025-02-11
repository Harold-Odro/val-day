import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                heartbeat: {
                    '0%, 100%': { transform: 'scale(1)' },
                    '50%': { transform: 'scale(1.1)' },
                },
                roseFloat: {
                    '0%': { 
                        transform: 'scale(0) rotate(0deg)',
                        opacity: '0'
                    },
                    '20%': { 
                        transform: 'scale(1) rotate(180deg)',
                        opacity: '1'
                    },
                    '80%': { 
                        transform: 'scale(1) rotate(360deg) translate(50px, -50px)',
                        opacity: '1'
                    },
                    '100%': { 
                        transform: 'scale(0.5) rotate(540deg) translate(100px, -100px)',
                        opacity: '0'
                    }
                },
                fadeSlideIn: {
                    '0%': {
                        opacity: '0',
                        transform: 'translateX(2rem)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateX(0)'
                    }
                }
            },
            animation: {
                heartbeat: 'heartbeat 2s ease-in-out infinite',
                roseFloat: 'roseFloat 6s cubic-bezier(0.4, 0, 0.2, 1) infinite',
                fadeSlideIn: 'fadeSlideIn 1s ease-out forwards'
            },
            colors: {
                valentine: {
                    50: '#fff1f2',
                    100: '#ffe4e6',
                    200: '#fecdd3',
                    300: '#fda4af',
                    400: '#fb7185',
                    500: '#f43f5e',
                    600: '#e11d48',
                    700: '#be123c',
                    800: '#9f1239',
                    900: '#881337'
                }
            },
            transitionProperty: {
                'spacing': 'margin, padding',
            },
            transitionDuration: {
                '2000': '2000ms',
            },
            transitionTimingFunction: {
                'bounce-start': 'cubic-bezier(0.8, 0, 1, 1)',
                'bounce-end': 'cubic-bezier(0, 0, 0.2, 1)',
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
};
