const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');
module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Build your palette here

                truegray: colors.trueGray,
                amber: colors.amber,
                esmerald: colors.emerald,
                orange: colors.orange
              },
        },
    },

    variants: {
        extend: {
            opacity: ['responsive','hover','focus','disabled'],
        },
    },
    corePlugins: {

       container: false,
      },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
