const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
<<<<<<< HEAD
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
=======
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
>>>>>>> 5035fd7d5fcc0a2b2781ffdcff34cc0e82747dae
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },
<<<<<<< HEAD
    darkMode: 'class',

    plugins: [
        require('@tailwindcss/forms'),
        require('flowbite/plugin')
    ],

=======
    darkMode: "class",

    plugins: [require("@tailwindcss/forms"), require("flowbite/plugin")],
>>>>>>> 5035fd7d5fcc0a2b2781ffdcff34cc0e82747dae
};
