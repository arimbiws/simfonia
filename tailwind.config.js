import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import { initFlowbite } from "flowbite";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js", //
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },

            placeholderColor: {
                gray: "#9ca3af", // tailwind default gray-400
            },
            fontWeight: {
                normal: 400,
            },
        },
    },

    plugins: [forms, require("flowbite/plugin")],
};
