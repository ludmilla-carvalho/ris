const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                prx: ['Proxima Nova', ...defaultTheme.fontFamily.sans],
                bld: ['Proxima Nova Bold'],
            },
            colors: {
                'verde': '#1a5b2e',
                'azul-m': '#142547',
                'azul': '#20699a',
                'azul-e': '#142547',
                'vermelho': '#cd2029',
                'laranja': '#f68822',
                'amarelo': '#fee901',
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('tw-elements/dist/plugin'),
        require('@tailwindcss/aspect-ratio'),
    ],
};


