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
                inter: ["Inter", "sans-serif"],
                poppins: ["Poppins", "sans-serif"],
            },
            colors: {
                lightblue: "rgba(123, 176, 255, 1)",
                verylightblue: "rgba(197, 227, 251, 1)",
                buttonblue: "rgba(10, 148, 255, 1)",
                mainblue: "rgba(66, 141, 255, 1)",
                bluelowopacity: "rgba(173, 206, 255, 0.34)",
            },
            spacing: {
                579: "579px",
            },
            dropShadow: {
                default: ["0 8px 40px 0 rgba(0, 0, 0, 0.05)"],
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
