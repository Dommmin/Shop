const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'custom-gray': '#808080',
                'custom-brown': '#800000',
                'custom-beige': '#F5F5DC',
                'custom-blue': '#0000FF',
                'custom-teal': '#66CDAA',
                'custom-turquoise': '#40E0D0',
                'custom-green': '#008000',
                'custom-olive': '#808000',
                'custom-yellow': '#FFFF00',
                'custom-orange': '#FFA500',
                'custom-red': '#FF0000',
                'custom-rose': '#FF1493',
                'custom-lilac': '#C8A2C8',
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
