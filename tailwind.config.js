const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                lightblue: "rgba(123, 176, 255, 1)",
                verylightblue: "rgba(197, 227, 251, 1)",
                buttonblue: "rgba(10, 148, 255, 1)",
            },
            spacing: {
                579: "579px",
            },
        },
        fontFamily: {
            inter: ["Inter", "sans-serif"],
            poppins: ["Poppins", "sans-serif"],
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
