import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
import colors from 'tailwindcss/colors';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './app/Livewire/**/*.php',
        './database/seeders/**/*.php',
    ],
    safelist: [
        { pattern: /grid-cols-(1|2|3|4|5|6|7|8|9|10|11|12)/, variants: ['sm', 'md', 'lg', 'xl'] },
        { pattern: /col-span-(1|2|3|4|5|6|7|8|9|10|11|12)/, variants: ['sm', 'md', 'lg', 'xl'] },
        'bg-[#eb0a1e]',
        'text-[#eb0a1e]',
        'border-[#eb0a1e]',
        'bg-[#25D366]',
        'hover:bg-[#20ba59]',
        'w-[230px]',
        'h-[110px]',
        'max-w-[230px]',
        'max-h-[110px]',
        'h-[170px]',
        'top-[126px]',
        'top-[71px]',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['"Raleway"', ...defaultTheme.fontFamily.sans],
                heading: ['"Raleway"', ...defaultTheme.fontFamily.sans],
                display: ['"Raleway"', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                consur: {
                    red: '#eb0a1e',
                    dark: '#070709',
                    mid: '#0d0e14',
                    panel: '#111318',
                    border: '#1e2029',
                },
                primary: {
                    50: '#f0f6fa',
                    100: '#dceaf2',
                    200: '#bdd8e7',
                    300: '#8ebfd8',
                    400: '#589fc4',
                    500: '#416A8D',
                    600: '#2c5373',
                    700: '#25445f',
                    800: '#223a4f',
                    900: '#203243',
                },
                toyota: {
                    red: '#EB0A1E',
                    darkred: '#BA0C2F',
                    black: '#111111',
                    gray: '#58595B',
                    light: '#F8F9FA'
                },
                gray: colors.slate,
                success: colors.emerald,
                danger: colors.rose,
                warning: colors.amber,
                info: colors.sky,
            },
            keyframes: {
                fadeUp: {
                    '0%': { opacity: '0', transform: 'translateY(24px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                scaleIn: {
                    '0%': { opacity: '0', transform: 'scale(0.96)' },
                    '100%': { opacity: '1', transform: 'scale(1)' },
                },
                shimmer: {
                    '0%': { backgroundPosition: '-200% 0' },
                    '100%': { backgroundPosition: '200% 0' },
                }
            },
            animation: {
                fadeUp: 'fadeUp 0.6s ease-out forwards',
                scaleIn: 'scaleIn 0.5s ease-out forwards',
                shimmer: 'shimmer 2.5s linear infinite',
            }
        },
    },
    plugins: [forms, typography],
};
